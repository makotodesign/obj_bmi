<?php

class human {
    private $name;
    private $height;
    private $weight;
    
    public function setname($setname){
        $this->name=$setname;
    }
    public function setheight($setheight){
        $this->height=$setheight;
    }
    
    public function setweight($setweight){
        $this->weight=$setweight;
        
    }
    public function getname(){
       return $this->name;
    }
    public function getheight(){
        return $this->height;
    }
    public function getweight(){
        return $this->weight;
    }
    
    public function getbmi(){
        //BMI（体格指数：Body Math Index）は下記の式で計算される値で、肥満の程度を知るための指数です。
        //BMI＝体重（kg）÷（身長（m）×身長（m））    
       $bmi=$this->weight/(($this->height/100)*($this->height/100));
       $bmi=round($bmi,2);//bmi値を小数点第２位で四捨五入
        return $bmi;
    }

    
    public function __construct($n,$w,$h){
        $this->setname($n);
        $this->setweight($w);
        $this->setheight($h);
        
    }

}
$post_flug=false;
if(isset($_POST['name'])&&isset($_POST['height'])&&isset($_POST['weight'])){
    $person=new human(h($_POST['name']),h($_POST['weight']),h($_POST['height']));
    $post_flug=true;
    
}else{
    $post_flug=false;
}

function h($v){
return htmlspecialchars($v,ENT_QUOTES);    
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="style.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="./js/main.js"></script>
<title>phpオブジェクト実験bmi判定マシン</title>
</head>
<body>
<div class="container">
   <h1 class="maintitle">BMI判定マシン</h1>
    <div class="box">
        <form action="" method="post">
            <input type="text" name="name" placeholder="名前"><br>
            <input type="text" name="height" placeholder="身長" required>cm<br>
            <input type="text" name="weight" placeholder="体重" required>kg<br>
            <input type="submit" value="クリックしてbmi判定してみよう！">
            
        </form>
    </div>

        <?php if($post_flug==true):?>
        <div id="result" class="box">
            <h2><?php echo $person->getname(); ?>さんのBMI</h2>
            <p>
                身長:<?php  echo $person->getheight(); ?>cm 体重<?php echo $person->getweight();?>kg <br>
              BMI(体格指数)は<br>
              <?php echo $person->getbmi();?>です<br>
              判定は
              <?php
                $bmi=$person->getbmi();
                if($bmi<18.5){
                    echo 'やせ型です';
                }
                if($bmi>=18.5 && $bmi<25){
                    echo '標準型です';
                }
                if($bmi>=25 && $bmi<30){
                    echo '肥満型です';
                }
                if($bmi>=30){
                    echo '高度肥満型です';
                }



                ?>

            </p>
            <button onClick="location.href='index.php'">リセット</button>
        </div>  
        <?php endif; ?>


</div>

</body>
</html>