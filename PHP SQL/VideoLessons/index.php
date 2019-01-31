<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PHP | Learn</title>
        <link rel='icon' href='https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/php-512.png'>
    </head>
    <body>
      
        <?php 
        ##Lesson 4,5 | variable
            /*  
            $var = 5;
            echo $var;
            echo "<br>";

            $var = 'string';
            echo $var;
            echo '<hr>';

            echo "hello $var";

            $a = 2;
            $b = 3;
            $c1 = 'Popoxakan $a = ' . $a. '<br>';
            $c2 = 'Popoxakan $b = ' . $b. '<br>';

            echo $c1,$c2;

        ## Lesson 6 | constant

            define('A',5);
            echo A;

            $b = A+3;
            echo '<hr>' . $b;
        ## Lesson 7 | external files


            echo '<h1>Header</h1> <hr>';
            echo '<p>Content</p><hr>';
            echo '<p>Footer</p>';

            include('inc/header.php');
            require('inc/content.php');  //tarberutyuny vor cody ays depqum chi sharnakvum filen chgtnelu depqum
            include('inc/footer.php');

        ## Lesson 8,9,10 | if, elseif, else

        $a = 1;
        $b = 3;

        if($a < $b) {
            echo 'A < B';
        }elseif($a > $b){
            echo 'A > B';
        }else{
            echo 'A = B';
        }

        echo '<hr>';

        $c = 1;
        $d = 1;

        if($c===$d){
            echo  '$a === $d';
        }else if ($c == $d){
            echo '$c == $d';
        }

        ## Lesson 11 | switch case

        $a = 3;

        switch($a){
            case 1:echo 'a = 1'; break;
            case 2:echo 'a = 2';break;
            default: echo 'a < 1 or a > 2';
        }

        ## Lesson 12,13,14 | Arrays

        $lang[5] = 'HTML';
        $lang[2] = 'CSS';
        $lang[4] = 'JavaScript';
        echo '<pre>';
        print_r($lang);
        echo '</pre>'; 

        echo '<hr>';

       // $lang2 = array('HTML','CSS','PHP','JavaScript','C++');
       $lang2 = array( 1 => 'HTML', 2 => 'CSS',0 => 'PHP',4 => 'JavaScript', 3 =>'C++','Java ');
        echo '<pre>';
        print_r($lang2);
        echo '</pre>'; 

        $capital['Armenia'] = 'Yerevan';
        $capital['Russia'] = 'Moscow';
        $capital['France'] = 'Paris';

        echo '<pre>';
        print_r($capital);
        echo '</pre>';

        echo $capital['France'];

        $book1 = array('author' => 'Napoleon Hill','title' => 'Think');
        $book2 = array('author' => 'Brain Traicy','title' => 'Musulman');
        $book3 = array('author' => 'Lev Tolstoy','title' => 'War and World');
        $book4 = array('author' => 'Gerber Wells','title' => 'Time machine');

        $shelf1[0] = $book1;
        $shelf1[1] = $book2;
        
        $shelf2[0] = $book3;
        $shelf2[1] = $book4;


        $book_shelf[0] = $shelf1;
        $book_shelf[1] = $shelf2;

        $book_shelf[2][0]['author'] = 'Francis Scott Fidgerald';
        $book_shelf[2][0]['title'] = 'Great Gatsby';

        

        echo '<pre>';
        print_r($book_shelf);
        echo '</pre>';

         ## Lesson 15 | for
        
         for($i=0;$i<=5;$i++){
             echo $i . '<hr>';
         }

         echo '<br><br><hr style = "border-width:2px;"><br><br>';

         for($i=5;$i>0;$i--){
            echo $i . '<hr>';
        }

        ## Lesson 16 | while

        $i=0;

        while($i<=5){
            echo $i . '<br>';
            $i++;
        }

        echo '<hr>';

        $j=0;

        do{
            echo $j . '<br>';
            $j++;
        }while($j<=5)

        ## Lesson 17 | foreach

        $ages = array('Arthur'=>21,'Karen'=>26,'Ani'=>24,'Aram'=>52,'Tamara'=>48);

        foreach($ages as $key => $val){
            echo '<br>Name: ' . $key . ' | Age: ' . $val;
        }

        echo '<hr>';

        $names = array('Arthur','Karen','Ani','Aram','Tamara');

        foreach($names as $val){
            echo '<br>Name: ' . $val;
        }

        echo '<hr>';

        $array = array(
            'fruit' => array('apple','mango','banana'),
            'car'=> array('Audi','BMW','Honda'),
            'mobile'=> array('Samsung','iPhone','Sony'),
        );

        foreach($array as $key => $val){
            echo '<br>'.$key.'<br>';
            foreach($val as $value){
                echo ' | ' . $value;
            }
        } 

        ## Lesson 18,19 | functions

        include('inc/func.php');      

        func1();
        echo '<hr>';

        $var1 = 4;
        $var2 = 6;

        func2($var1,$var2);

        echo '<hr>';
        func3(2); 

        echo '<hr>';
        func4(1);
        
        echo '<hr>';
        func5(); 

        $cars[] = 'BMW';
        $cars[] = 'Mercedes';
        $cars[] = 'Kia';
        echo count($cars) . '<hr>';

        list($car1,$car2,$car3) =$cars;
        echo $car1 . '<hr>';
        
        $date = '25.12.1999';
        list($day,$month,$year) = explode('.',$date);
        echo $day . '<hr>';

        $text = ' Arthur ';
        echo '<p>' . trim($text) . '</p><hr>';

        echo pow(4,3);
        echo '<hr>';

        echo sqrt(4);
        echo '<hr>';

        echo abs(-6);
        echo '<hr>';

        echo round(5.5);
        echo '<hr>';

        echo ceil(8.1);
        echo '<hr>';

        echo floor(2.9);
        echo '<hr>';

        echo rand(1,20);
        echo '<hr>';

        $a = 3;

        if(isset($a)){
            echo '1';
        }else{
            echo '0';
        }

        echo '<hr>';
        unset($a); 
        if(isset($a)){
            echo '1';
        }else{
            echo '0';
        }

        echo '<hr>';

        $b = '25a';
        if(is_numeric($b )){
            echo '1';
        }else{
            echo '0';
        }

        echo '<hr>';
        $c = 9.5;

        if(is_int($c)){
            echo '1';
        }else{
            echo '0';
        }

        echo '<hr>';
        $d = 9.4;

        if(is_float($d)){
            echo '1';
        }else{
            echo '0';
        }

        $e = 'Black white Black White';
        $f = 'Dark Gray Dark Gray';

        echo str_replace('Black','Red', $e) . '<br>';
        echo str_replace('Gray','Green',$f);
        
        $g = '  Arthur  ';

        echo $g . '<br>';
        echo strlen($g). '<br>';
        echo strlen(trim($g));*/

        

        ?> 
    </body>
</html>
