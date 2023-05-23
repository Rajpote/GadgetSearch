<?php
    session_start();
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetSearch</title>
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="manifest" href="/site.webmanifest">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Poppins, sans-serif;
        }

        html{
            scroll-behavior: smooth;
        }

        .content-container table{
            margin: 3vh 7.7vw 6.7vh 7.7vw;
            width: 85%;
            text-align: justify;
            border-radius: 15px;
            border-collapse: collapse;
        }

        .spec-container table{
            margin: 6.7vh 10.25vw 1vh 10.25vw;
            text-align: justify;
            background-color: #e6e9ef;
            border-radius: 15px;
            border-collapse: collapse;
            box-shadow: 0px 0px 5px 0px rgba(163, 158, 163, 1);
            width: 80%;
        }
        
        .content-container i{
            position: relative;
            right: 0.5vw;
        }

        .title{
            font-size: 1.5rem;
            font-weight: 500;
            text-align: center;
        }

        .content-cell-spacing{
            padding: 50px 37px 0px 37px;
            line-height: 4.5vh;
        }

        .eligibility, .job{
            font-size: 1.15rem;
            font-weight: 500;
        }

        .cell-spacing{
            padding: 15px 37px 0px 37px;
            line-height: 4.5vh;
        }

        .list-cell-spacing{
            padding: 15px 37px 0px 55px;
            line-height: 4.5vh;
        }

        .job-list-cell-spacing{
            padding: 15px 10px 15px 45px;
            line-height: 4.5vh;
        }

        .job-cell-spacing{
            padding: 15px 27px 0px 27px;
            line-height: 4.5vh;
        }

        .job-list{
            display: flex;
            flex-wrap: wrap;
            margin: 0;
            padding: 0;
        }

        .job-list li{
            margin-right: 2.15vw;
        }
        main{
            position: relative;
         }
         main form{
            display: block;
            margin: 10px;
            border: 1px solid black;
            width: 20%;
            height: 20%;
            padding: 5px 5px;
            border-radius: 12px;
            color: blue;
         }
         .feedback{
            display: flex;
            align-items: center;
            justify-content: left;
            padding: 10px 10px;
         }
         #submit-btn.feedback{
            display: flex;
            align-items: center;
            justify-content: center;
         }
         textarea{
            width: 90%;
            padding: 10px;
            margin: 5px;

         }
         input{
            width: 50%;
           padding: 5px 0px 5px 25px;
           

         }
         i#feedbackuser{
            position: absolute;
            left: 30px;

         }
    </style>
</head>
<body>
    <!-- <a href="homepage.php"><img src="Images/logo.png" alt="Website Logo" class="website-logo"></a> -->
    <?php
        if(isset($_GET['g_id'])){
            $g_id = $_GET['g_id'];

            $sql = "SELECT * FROM gadget_details WHERE g_id=:g_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':g_id', $g_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        if(count($result)>0){
    ?>
        <div class="content-container">
        <table>
            <?php
                $i=0;
                foreach($result as $row){
            ?>
            <tr>
                <td class="title cell-spacing" colspan="2"><?php echo $row['gname']; ?></td>
            </tr>
            <tr>
                <td class="content content-cell-spacing" colspan="2"><?php echo $row['gdis']; ?></td>
            </tr>
            <tr>
                <td class="eligibility cell-spacing"><br>Eligibility</td>
            </tr>
            <tr>
                <td class="list-cell-spacing">
                <?php
                    $gspecification = explode("\n", $row['gspecification']);
                    echo "<ul>";
                    foreach($gspecification as $point){
                        echo "<li>$point</li>";
                    }
                    echo "</ul>";
                ?>
                </td>
            </tr>
            <?php
                $i++;
                }
            ?>
        </table>
        </div>

        <div class="spec-container">
        <table>
            <tr>
                <td class="job job-cell-spacing">Prospect Careers</td>
            </tr>
            <tr>
                <td class="job-list-cell-spacing">
                <?php
                    echo "<p class='gprice'>{$row['gprice']} </p>";
                    
                ?>
                </td>
            </tr>
        </table>
        </div>
        <div class="image-pro">
        <?php
                    echo "<img class='gadget-img' src='image/product/{$row['gimage']}' alt='Gadget Image'>";
                    
                ?>
        </div>
        <div class="elink">
        <li><a href="<?php echo $row['glink']?>" target="_blank"><?php echo $row['glink']; ?></a></li>
        </div>
        <?php 
        }else{
            echo "No content available!";
        }
        ?>
        <main>
            <form action="" method="post">
                <div class="feedback">
                    <i id="feedbackuser" class="fa-solid fa-user"></i>
                    <input type="text" class="" placeholder="User-name" name="uname" required/>
                </div>
                <textarea name="feedback" id="" cols="30" rows="5" class="feedback"></textarea>
                
                <div class="feedback" id="submit-btn">
                    <input type="submit"  name="login-submit" id="login-submit" value="submit" />
                </div>
            </form>
        </main>
</body>
</html>