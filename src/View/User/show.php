<div>
    <?php echo $user->$email ?> 
    <br> 

    <?php echo "Année de ma promo {$user->promo->year}"; ?>

    <?php echo 'Mes jeux-vidéos préférés sont :' .PHP_EOL; foreach($user->article as $article)
    {
        echo $article->content.' ' .$article->price. 'euros' .PHP_EOL;
    }
    ?>
    <?php echo 'Mes fruits préférés sont :' .PHP_EOL; foreach($user->food as $food)
    {
        echo $food->name.PHP_EOL;
    }
    ?>


</div>