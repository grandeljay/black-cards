<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'inc/pageHead.php'; ?>
</head>
<body>
    <main>
        <h1>Start a Black Cards Game</h1>

        <form action="game" method="post">
            <label for="name">What is your name?</label>
            <input type="text" name="name" id="name" placeholder="John Doe" pattern="[\w ]+" autocomplete="off">

            <input type="submit" value="Join">
        </form>
    </main>
</body>
</html>