<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dek-D Backend | ตั้งกระทู้</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<style>
    #theme {
        height: 20vw;
    }
</style>

<body>
    <?php

    ?>
    <section id="blog" class="section">
        <div class="container has-background-warning p-5">
            <div class="column p-5">
                <h1 class="title">
                <?php echo $_POST["topic"]; ?>
                </h1>
            </div>
            <div class="column has-background-warning-light">
                <p class="subtitle m-3">
                    <?php echo nl2br($_POST["content"]); ?>
                </p>
            </div>
    </section>
</body>

</html>