<?php
	   // Veritabanı bağlantı bilgilerini tanımlayın
	   $servername = "localhost"; // Veritabanı sunucusu (genellikle "localhost")
	   $username = "root"; // Veritabanı kullanıcı adı
	   $password = ""; // Veritabanı şifresi
	   $dbname = "cinema_db"; // Veritabanı adı
   
	   // Veritabanı bağlantısını oluşturun
	   $conn = new mysqli($servername, $username, $password, $dbname);
   
	   // Bağlantıyı kontrol edin
	   if ($conn->connect_error) {
		   die("Connection failed: " . $conn->connect_error);
	   }

	   $ORDERID = $_POST["ORDERID"];

	   // SQL sorgusunu hazırlayın
	   $sql = "SELECT * FROM bookingTable WHERE ORDERID = ?";
	   
	   // Sorguyu hazırlayın
	   $stmt = $conn->prepare($sql);
	   
	   // Parametreleri bağlayın
	   $stmt->bind_param("s", $ORDER_ID);
	   
	   // Sorguyu çalıştırın
	   $stmt->execute();
	   
	   // Sonuçları alın
	   $result = $stmt->get_result();
	   
	   // Sonuçları kontrol edin
	   if ($result->num_rows > 0) {
		   echo "The ORDER_ID exists in the database.";
	   } else {
		   echo "The ORDER_ID does not exist in the database.";
	   }
	// Bağlantıyı kapatın
	$conn->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Transaction status query</title>
    <meta name="GENERATOR" content="Evrsoft First Page">
</head>

<body>
    <h2>Transaction status query</h2>
    <form method="post" action="">
        <table border="1">
            <tbody>
                <tr>
                    <td><label>ORDER_ID::*</label></td>
                    <td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off"
                            value="<?php echo $ORDER_ID ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input value="Status Query" type="submit" onclick=""></td>
                </tr>
            </tbody>
        </table>
        <br /></br />
        <?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
        <h2>Response of status query:</h2>
        <table style="border: 1px solid nopadding" border="0">
            <tbody>
                <?php
					foreach($responseParamList as $paramName => $paramValue) {
				?>
                <tr>
                    <td style="border: 1px solid"><label><?php echo $paramName?></label></td>
                    <td style="border: 1px solid"><?php echo $paramValue?></td>
                </tr>
                <?php
					}
				?>
            </tbody>
        </table>
        <?php
		}
		?>
    </form>
</body>

</html>