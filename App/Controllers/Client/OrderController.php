<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Order\History;
use App\Views\Client\Pages\Order\Index;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Order\Success;
use App\Views\Client\Pages\Order\Detail;
use App\Views\Client\Pages\Order\Search;

class OrderController
{
    // Hiển thị danh sách
    public static function index()
    {
        // echo "<pre>";
        // var_dump($_POST);
        // exit;
        // Lấy danh sách danh mục
        $category = new Category();

        $categories = $category->getAllCategoryByStatus();

        $data = [
            'user_id ' => $_POST['user_id'],
            'total_price' => $_POST['total_price_payment'],
            'status' => $_POST['status'],
            'phone_number' => $_POST['phone_number'],
            'shipping_address' => $_POST['address'],
            'payment_method' => $_POST['payment_method'],
            'payment_status' => $_POST['payment_status'],

        ];
        $order = new Order();
        $order_detail = new OrderDetail();

        $results = $order->createOrder($data);

        $qtyArray = $_POST['qty'];
        $productComboArray = $_POST['product_combo'];
        $priceArray = $_POST['price'];

        for ($i = 0; $i < count($qtyArray); $i++) {
            $qty = $qtyArray[$i];
            $productCombo = trim($productComboArray[$i]);
            $price = (float) trim($priceArray[$i]);

            $data = [
                'order_id' => $results,
                'product_variant_option_combinations_id ' => $productCombo,
                'quantity' => $qty,
                'price' => $price
            ];

            $action = $order_detail->createOrderDetail($data);
        }



        // Lấy phương thức thanh toán từ POST
        $paymentMethod = $_POST['payment_method'] ?? null;

        if ($paymentMethod === 'VNPAY') {
            $vnp_TmnCode = "KHH8MPQF"; //Mã định danh merchant kết nối (Terminal Id)
            $vnp_HashSecret = "SIS57L0O98A6NWRVK19SB0F5NT4IQNAN"; //Secret key
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8081/orders/success";
            $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
            $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
            //Config input format
            //Expire

            $startTime = date("YmdHis");
            $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

            $vnp_TxnRef = $results; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán đơn hàng ' . $results;
            $vnp_OrderType = 250000;
            $vnp_Amount = $_POST['total_price_payment'] * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            $vnp_ExpireDate = $expire;

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_ExpireDate" => $vnp_ExpireDate

            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            // }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url
            );
            if (isset($_POST['redirect'])) {
                $cart = new Cart();
                $cart->clearCart();
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        } else {

            // Khởi tạo các biến mặc định
            $qrImage = null;
            $errorMessage = null;
            $orderId = $results; // Ví dụ: Mã đơn hàng giả định
            $shippingFee = 30000; // Phí vận chuyển giả định
            $totalAmount = (float) $_POST['total_price_payment']; // Tổng số tiền thanh toán giả định

            if ($paymentMethod === 'Online payment') {
                // Cấu hình cURL để tạo mã QR
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://bio.ziller.vn/api/qr/add",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 2,
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer fdee16f4e42554c44fefba77ef1d733d",
                        "Content-Type: application/json",
                    ),
                    CURLOPT_POSTFIELDS => json_encode(array(
                        'type' => 'text',
                        'data' => '2|99|0364402449|LE THI HUYNH NHU||0|0|' . $totalAmount . '|Thanh toán đơn hàng #' . $orderId . '|transfer_myqr',
                        'background' => 'rgb(255,255,255)',
                        'foreground' => 'rgb(0,0,0)',
                        'logo' => 'https://firebasestorage.googleapis.com/v0/b/vuejs-cb0f7.appspot.com/o/logo.png?alt=media&token=6e90a4aa-c58a-4816-a2aa-e2d7fa239ffd',
                    )),
                ));

                // Thực hiện yêu cầu cURL
                $response = curl_exec($curl);
                $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Lấy mã trạng thái HTTP

                // Kiểm tra lỗi cURL
                if ($response === false) {
                    $errorMessage = curl_error($curl); // Lấy thông báo lỗi
                } else {
                    // Kiểm tra mã trạng thái HTTP
                    if ($statusCode == 200) {
                        // Dữ liệu trả về hợp lệ
                        $qrData = json_decode($response, true); // Giải mã JSON

                        if (isset($qrData['link'])) {
                            $qrImage = $qrData['link']; // Lấy đường dẫn đến mã QR
                        } else {
                            $errorMessage = "Không tìm thấy mã QR trong phản hồi từ API.";
                        }
                    } else {
                        // Xử lý lỗi nếu API không trả về kết quả thành công
                        $errorMessage = "Lỗi khi tạo mã QR. HTTP Status: " . $statusCode;
                    }
                }

                curl_close($curl); // Đóng cURL
            } elseif ($paymentMethod === 'COD') {
                // Không cần xử lý thêm cho COD
                // Bạn có thể thêm các logic cần thiết cho COD tại đây
            } else {
                // Xử lý trường hợp không có phương thức thanh toán hoặc phương thức không xác định
                $errorMessage = "Không xác định được phương thức thanh toán.";
            }

            $category = new Category();
            $categories = $category->getAllCategoryByStatus();
            $order = new Order();
            $orders = $order->getOneById($orderId);
            $order_detail = new OrderDetail();
            $order_details = $order_detail->getAllOrderDetailByOrderId( $orderId);

            // Dữ liệu để render giao diện
            $data = [
                'payment_method' => $paymentMethod,
                'orders' => $orders,
                'qrImage' => $qrImage ?? null, // Truyền dữ liệu mã QR nếu có
                'errorMessage' => $errorMessage ?? null, // Truyền thông báo lỗi nếu có
                'categories' => $categories,
                'order_id' => $orderId,
                'shipping_fee' => $shippingFee,
                'total_amount' => $totalAmount,
                'order_details' => $order_details
            ];
            $cart = new Cart();
            $cart->clearCart();
            // echo '<pre>';
            // var_dump($data['order_details']);
            // exit;
            // Render giao diện
            Header::render($data); // Hiển thị header
            Index::render($data); // Render trang đơn hàng với dữ liệu
            Footer::render(); // Hiển thị footer
        }
    }

    public function vnpay()
    {

        $vnp_TmnCode = "KHH8MPQF"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "SIS57L0O98A6NWRVK19SB0F5NT4IQNAN"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8081/orders/success";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        //Config input format
        //Expire

        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $vnp_TxnRef = 1; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng đặt tại web';
        $vnp_OrderType = 250000;
        $vnp_Amount = 10000 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = $expire;

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }

    public function success()
    {
        $data = [
            'vnp_Amount' => $_GET['vnp_Amount'],
            'vnp_BankCode' => $_GET['vnp_BankCode'],
            'vnp_CardType' => $_GET['vnp_CardType'],
            'vnp_BankTranNo' => $_GET['vnp_BankTranNo'],
            'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
            'vnp_PayDate' => $_GET['vnp_PayDate'],
            'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
            'vnp_TxnRef' => $_GET['vnp_TxnRef']
        ];
        if (isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == "00") {
            $order = new Order();
            $order->updatePaymentStatus($_GET['vnp_TxnRef'], 'Paid');
            $currentDate = date("d/m/Y");
            if (isset($_COOKIE['user'])) {
                $userData = json_decode($_COOKIE['user'], true);

                // Kiểm tra xem các trường 'username' và 'email' có tồn tại không
                if (isset($userData['first_name']) && isset($userData['email'])) {
                    $name = $userData['first_name'];
                    $email = $userData['email'];
                } else {
                    echo "Thông tin username hoặc email không tồn tại trong cookie.";
                }
            } else {
                echo "Cookie 'user' không tồn tại.";
            }
            $id = $_GET['vnp_TxnRef'];
            $order = new Order();
            $orders = $order->getOneById($id);
            $order_detail = new OrderDetail();
            $order_details = $order_detail->getAllOrderDetailByOrderId($id);
            $data1 = [
                'orders' => $orders,
                'order_details' => $order_details
            ];
            // Gửi email khi giao dịch thành công
            $phpEmail = AuthHelper::sendEmailOrder($email, $name, $_GET['vnp_TxnRef'], $_GET['vnp_Amount'] / 100, $currentDate, 'VNPAY', $data1);
        }

        // echo "<pre>";
        // var_dump($_GET);
        // exit;
        Success::render($data);
    }

    public function history()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
    
        $order = new Order();
        $id = null;
    
        // Kiểm tra cookie 'user'
        if (isset($_COOKIE['user'])) {
            $userData = json_decode($_COOKIE['user'], true);
    
            if (isset($userData['id'])) {
                $id = $userData['id'];
            } else {
                // Chuyển hướng đến trang đăng nhập nếu không có ID trong cookie
                header("Location: /login");
                exit;
            }
        } else {
            // Chuyển hướng đến trang đăng nhập nếu không có cookie
            header("Location: /login");
            exit;
        }
    
        // Lấy danh sách đơn hàng của người dùng
        $orders = $order->getAllOrderByUserId($id);
    
        // Nếu không có đơn hàng, hiển thị thông báo
        if (empty($orders)) {
            $orders = [];
        }
    
        // Phân trang
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 10;
        $totalItems = count($orders);
        $totalPages = ceil($totalItems / $itemsPerPage);
    
        $currentPage = max(1, min($currentPage, $totalPages));
        $offset = ($currentPage - 1) * $itemsPerPage;
        $pageData = array_slice($orders, $offset, $itemsPerPage);
    
        // Hiển thị giao diện
        Header::render(['categories' => $categories]);
        History::render($pageData, $currentPage, $itemsPerPage, $totalItems);
        Footer::render();
    }
    

    public static function detail($id)
    {

        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $order = new Order();
        $orders = $order->getOneById($id);
        $order_detail = new OrderDetail();
        $order_details = $order_detail->getAllOrderDetailByOrderId($id);
        $data = [
            'categories' => $categories,
            'orders' => $orders,
            'order_details' => $order_details
        ];
        // echo '<pre>';
        // var_dump($data['order_details']);
        // exit;
        Header::render($data);
        Detail::render($data);
        Footer::render();
    }

    public static function search()
    {

        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        if (!isset($_GET['keyword']) || $_GET['keyword'] == '') {
            header('location: /orders/history');
            exit();
        }

        $keyword = urldecode($_GET['keyword']);
        $order = new Order();
        $id = null;

        if (isset($_COOKIE['user'])) {
            $userData = json_decode($_COOKIE['user'], true);
    
            if (isset($userData['id'])) {
                $id = $userData['id'];
            } else {
                header("Location: /login");
                exit;
            }
        } else {
            header("Location: /login");
            exit;
        }
    
        // Lấy danh sách đơn hàng của người dùng
        $orders = $order->getAllOrderByUserIdAndStatus($id,$keyword);
    
        if (empty($orders)) {
            $orders = [];
        }
    
        // Phân trang
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 10;
        $totalItems = count($orders);
        $totalPages = ceil($totalItems / $itemsPerPage);
    
        $currentPage = max(1, min($currentPage, $totalPages));
        $offset = ($currentPage - 1) * $itemsPerPage;
        $pageData = array_slice($orders, $offset, $itemsPerPage);

        // echo "<pre>";
        // var_dump($data);

        Header::render(['categories' => $categories]);
        Notification::render();
        NotificationHelper::unset();
        Search::render($pageData, $currentPage, $itemsPerPage, $totalItems);
        Footer::render();
    }
}
