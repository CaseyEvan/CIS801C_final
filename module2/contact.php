<!DOCTYPE html>
<html>
<head>
<style>
img {
    max-width: 100%;
    height: auto;
}

body {
    font-size: 16px;
    background-color: #F0EDE5;
}



ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    position: -webkit-sticky; /* Safari */
    position: sticky;
    top: 0;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    font-size: 20px;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #C0AB8E;
}

.active {
    background-color: #BCBCBE;
    color: black;
}

table {
  font-size: 18px;
  font-family: fantasy;


}

</style>
</head>
<body>

<div class="header">
  <h2><img src="https://images.cooltext.com/5205992.png"/></a>
  <p></p>
</div>

<ul>
  <li><a href="http://dnsfmwad.centralus.cloudapp.azure.com/Module_03/Project/home.html">Home</a></li>
  <li><a href="http://dnsfmwad.centralus.cloudapp.azure.com/Module_03/Project/men.html">Men's</a></li>
  <li><a href="http://dnsfmwad.centralus.cloudapp.azure.com/Module_03/Project/women.html">Woman's</a></li>
  <li><a href="http://dnsfmwad.centralus.cloudapp.azure.com/Module_03/Project/faq.html">FAQ</a></li>
  <li><a class="active" href="http://dnsfmwad.centralus.cloudapp.azure.com/Module_03/Project/contact.php">Contact us</a></li>
  <li><a href="http://dnsfmwad.centralus.cloudapp.azure.com/Module_03/Project/mySQL.php">Item Index</a></li>
</ul>

<div class="Featured">
  <img src="https://images.cooltext.com/5210641.png"/>

  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum fringilla lacinia. Duis volutpat in tellus non luctus. Fusce dapibus erat sed magna sollicitudin feugiat. Nulla ut nunc eu dolor auctor pharetra. Donec mollis gravida purus at congue. Nam id magna nec nibh vestibulum porta. In arcu libero, tempus ut dolor auctor, ultrices viverra nisi. Sed volutpat congue luctus. Etiam est lorem, blandit ac auctor ac, ornare vitae ligula. Fusce eu consequat felis, et tincidunt odio. Nam venenatis purus ac nulla fringilla pretium. Aenean quis mauris ornare, pharetra sem ac, laoreet dolor. Sed a quam interdum, suscipit metus ac, dictum neque. Pellentesque ac felis et metus fringilla pellentesque sed sed mauris. Sed fringilla felis tortor, ac euismod nulla laoreet in. </p>
</div>

<div class = "table">
<?php
echo "<table style='border: solid 3px #C0AB8E;'>";
 echo "<tr><th>First Name</th><th>Last Name</th><th>Email Address</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 3px solid #C0AB8E;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost:3306";
$username = "Learner";
$password = "Rasmussen";
$dbname = "adventureworks";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT FirstName, LastName, EmailAddress FROM contact");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?></div>

<h3></h3>



</body>
</html>
