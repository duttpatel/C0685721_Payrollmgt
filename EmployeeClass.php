<?php
$con=mysqli_connect();
class EmployeeClass
{
    public $name="";
    public $gender="";
    public $dob="";
    public $add="";
    public $city="";
    public $province="";
    public $pincode="";
    public $email="";
    public $weblink="";
    public $doj="";
    public $basic="";
    public $eid=0;
    var $servername = "localhost";
	var $username = "root";
	var	$password = "";
    var $dbname = "pms";
    function insertData()
    {
        $GLOBALS['con'] = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $query="insert into employee values (null,'$this->name','$this->gender','$this->dob','$this->add','$this->city','$this->province','$this->pincode','$this->email','$this->weblink','$this->doj','$this->basic')";
        $result=mysqli_query($GLOBALS['con'],$query);
        $GLOBALS['con']->close();
        header('location:Employee.php');
    }

    function updateData()
    {
        $GLOBALS['con'] = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_query($GLOBALS['con'],"update employee set Name='$this->name',Gender='$this->gender',DOB='$this->dob',Address='$this->add',City='$this->city',Province='$this->province',PostalCode='$this->pincode',Email='$this->email',webLink='$this->weblink',DOJ='$this->doj',BasicPay='$this->basic' where EId=$this->eid");
        $GLOBALS['con']->close();
        header('location:Employee.php');
    }
    function deleteData()
    {
        $GLOBALS['con'] = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_query($GLOBALS['con'],"delete from employee where EId=$this->eid ");
        $GLOBALS['con']->close();
       header('location:Employee.php');
    }
    function selectData()
    {
        $GLOBALS['con'] = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $r =mysqli_query($GLOBALS['con'],"select * from employee");
        $GLOBALS['con']->close();
        return $r;
    }

    function selectDataRow($id)
    {
        $GLOBALS['con'] = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $r =mysqli_query($GLOBALS['con'],"select * from employee where EId=$id");
        $GLOBALS['con']->close();
        return $r;
    }
    function createConection()
    {
        
            // Create connection
            $GLOBALS['con'] = mysqli_connect($this->servername, $this->username, $this->password);
            // Check connection
            if (!$GLOBALS['con']) {
                die("Connection failed: " . mysqli_connect_error());
            }
            mysqli_close($GLOBALS['con']);

    }

    function createDataBase()
    {

        // Create database
        $GLOBALS['con'] = mysqli_connect($this->servername, $this->username, $this->password);

            $sql = "CREATE DATABASE IF NOT EXISTS pms";
            if ($GLOBALS['con']->query($sql) === TRUE) {
                //echo "Database created successfully";
            } else {
                //echo "Error creating database: " . $GLOBALS['con']->error;
            }
            mysqli_close($GLOBALS['con']);
       
    }

    function createTable()
    {
        $GLOBALS['con'] = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $q="SHOW TABLES LIKE 'employee'";
        if($result=mysqli_query($GLOBALS['con'],$q))
        {
            if($result->num_rows == 0) {
                mysql_select_db($this->dbname);
                
                                $sql = "CREATE TABLE employee (
                                EId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                                Name VARCHAR(30) NOT NULL,
                                Gender VARCHAR(30) NOT NULL,
                                DOB date,
                                Address VARCHAR(50),
                                City VARCHAR(200),
                                Province varchar(200),
                                PostalCode VARCHAR(50),
                                Email VARCHAR(50),
                                webLink VARCHAR(30),
                                DOJ date,
                                BasicPay int(11)
                                )";
                
                                if (mysqli_query($GLOBALS['con'], $sql)) {
                                    //echo "Table Employee created successfully";
                                    $this->insertEmployee();
                                }
            }
        }

                //mysqli_close($GLOBALS['con']);
        
        }
        function insertEmployee()
        {
            $GLOBALS['con'] = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
                        mysql_select_db($this->dbname);
                        $sql="insert into employee values (null,'Dutt Patel','Male','1994-12-12','73 campwood','Brampton','ON','L6P3S8','duttupatel@gmail.com','duttupatel@gmail.com','2014-09-15',60000)";
        
                    if ($GLOBALS['con']->query($sql) === TRUE) 
                    {
                        //echo "New record created successfully";
                    } 
                    $sql="insert into employee values (null,'Jeet Patel','Male','1993-01-12','75 campwood','Brampton','ON','L6P3S8','jeet@gmail.com','jeet@gmail.com','2014-09-14',40000)";
                    if ($GLOBALS['con']->query($sql) === TRUE) 
                    {
                        //echo "New record created successfully";
                    } 
                    $sql="insert into employee values (null,'Meet Patel','Male','1994-02-10','76 campwood','Brampton','ON','L6P3S8','meet@gmail.com','meet@gmail.com','2012-10-11',90000)";
                    if ($GLOBALS['con']->query($sql) === TRUE) 
                    {
                        //echo "New record created successfully";
                    }
                    $GLOBALS['con']->close();
        }
}
?>