<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<style>
    #theme {
        height: 20vw;
    }
    textarea{
        resize: vertical;
    }
</style>

<body>
    <?php
    $topic = $content = $success =  "";
    $topicErr = $contentErr = "";
    $length = 20000;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["topic"])) {
            $topicErr = "* Please enter the name topic";
        }
        if (empty($_POST["content"])) {
            $contentErr = "* Please add content";
        }
        if (!empty($_POST["topic"]) && !empty($_POST["content"])) {
            $topic = $_POST["topic"];
            $content = $_POST["content"];
            //Validate length topic
            if (strlen($topic) < 4 || strlen($topic) > 140) {
                $topicErr = "*Topic length must be between than 4 and 140";
            }
            //Validate Tags HTML
            if (strip_tags($topic) != $topic) {
                $topicErr = "* Topic should not contain HTML tags.";
            }
            //Validate length Content
            if (strlen($content) < 6 || strlen($content) > 20000) {
                $contentErr = "*Content length must be between than 6 and 20000";
            }
        }
        if ($topicErr == "" && $contentErr == "") {
            $success = "🔽 Post Successfully 🔽";
        }
    }
    ?>
    <section class="section">
        <div class="container has-background-warning p-5">
            <div class="column">
                <h1 class="title has-text-centered">
                    New Topic
                </h1>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="column">
                    <input class="input is-success" type="content" placeholder="Topic name" name="topic">
                    <?php echo "<p class='has-text-danger'>" . $topicErr . "</p>" ?>
                </div>
                <div class="column">
                    <div class="column is-pulled-left">
                        <p class="subtitle">
                            Content
                        </p>
                    </div>
                    <textarea id="theme" class="input is-success" type="content" placeholder="Content" name="content" onchange="<?php $length = 1 ?>"></textarea>
                    <?php echo "<p class='has-text-danger'>" . $contentErr . "</p>" ?>
                </div>
                <div class="column">
                    <input type="submit" name="submit" class="button is-danger" value="Submit">
                </div>
                <?php echo "<p class='title has-text-success has-text-centered mb-5'>" . $success . "</p>" ?>
            </form>
    </section>
    <?php
    if ($topicErr == "" && $contentErr == "") {
        require_once('blog.php');
    }
     ?>
</body>

</html>