<?php
include_once '../header.php';

// echo $_POST['id'];
// exit();
if (isset($_POST['go_to_product']) || isset($_POST['display-product'])) {

    include_once '../includes/dbh_inc.php';
    include_once '../includes/function_inc.php';

    $productInfo = getProductInfo($conn, $_POST['product_id']);

?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="pic-image">
                    <img src="/online_shopping_system/img/product_img/<?= $productInfo['product_image_1'] ?>">
                </div>
            </div>
            <div class="col">
                <h3><?php echo  $productInfo['product_name'] ?></h3>
                <h4>Key Features</h4>
                <p>
                    Model: Galaxy Watch 4 Classic <br>
                    Circular Super AMOLED Display <br>
                    Exynos W920 Dual Core Processor <br>
                    16GB Internal Memory <br>
                    361mAh Battery<br>
                </p>
                <form>
                    <input type="number">
                    <button type="button" class="btn btn-primary">Buy Now</button>
                </form>
            </div>
        </div>

        <div class="specbox">
            <h4>Product Specifications</h4>
        </div>

        <dl class="row">
            <dt class="col-sm-3">Processor</dt>
            <dd class="col-sm-9">Exynos W920 Dual Core 1.18GHz</dd>

            <br>

            <dt class="col-sm-3">Display</dt>
            <dd class="col-sm-9">1.4" (34.6mm) Circular Super AMOLED (450x450)
                Full Color Always On Display
                Corning® Gorilla® Glass DX+
            </dd>

            <br>

            <dt class="col-sm-3">Memory</dt>
            <dd class="col-sm-9">1.5GB RAM + 16GB Internal Memory</dd>

            <br>

            <dt class="col-sm-3">Battery</dt>
            <dd class="col-sm-9">361mAh</dd>

            <br>

            <dt class="col-sm-3">Connectivity</dt>
            <dd class="col-sm-9">LTE, Bluetooth® 5.0, Wi-Fi 802.11 a/b/g/n 2.4+5GHz,
                NFC, A-GPS/GLONASS/Beidou/Galileo</dd>

            <br>

            <dt class="col-sm-3 text-truncate">OS</dt>
            <dd class="col-sm-9">Wear OS Powered by Samsung</dd>

            <br>

            <dt class="col-sm-3 text-truncate">Special Features</dt>
            <dd class="col-sm-9">5ATM + IP68 / MIL-STD-810G Durability</dd>

            <br>

            <dt class="col-sm-3 text-truncate">Sensors</dt>
            <dd class="col-sm-9">Accelerometer, Barometer, Gyro Sensor, Geomagnetic Sensor, Light Sensor, Optical Heart Rate Sensor,
                Electrical heart sensor, Bioelectrical Impedance Analysis Sensor</dd>

            <br>

            <dt class="col-sm-3 text-truncate">Others</dt>
            <dd class="col-sm-9">Durability: 5ATM+IP68/MIL-STD-810G
                Compatibility: Compatible with Android 6.0 or higher, RAM 1.5GB above</dd>

            <br>

            <dt class="col-sm-3">Dimensions</dt>
            <dd class="col-sm-9">44.4 x 43.3 x 9.8mm</dd>

            <br>

            <dt class="col-sm-3">Weight</dt>
            <dd class="col-sm-9">30g (Armor Aluminum, without strap)</dd>

            <br>

            <dt class="col-sm-3">Colour</dt>
            <dd class="col-sm-9">Black, Silver</dd>

            <dt class="col-sm-3">Warranty</dt>
            <dd class="col-sm-9">No Warranty</dd>

            <br>
        </dl>
    </div>




<?php
}
include_once '../footer.php';
?>