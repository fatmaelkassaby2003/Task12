<?php
require_once(__DIR__ . '/../config/conn.php');

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    $sql = "SELECT posts.*, comments.comment 
            FROM posts 
            LEFT JOIN comments ON comments.post_id = posts.id 
            WHERE posts.id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $post_id]);
    $post = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "<p>No post ID specified.</p>";
}
?>

<header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?php echo $post[0]['title']; ?></h1>
                    <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                    <span class="meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        on <?php echo $post[0]['created_at']; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?php 
                    if ($post) {
                        echo "<h1>{$post[0]['title']}</h1>";
                        echo "<p>{$post[0]['content']}</p>";
                        echo "<p>Posted on {$post[0]['created_at']}</p>";
                        
                        // عرض التعليقات المرتبطة
                        echo "<h3>Comments:</h3>";
                        foreach ($post as $row) {
                            if (!empty($row['comment'])) {
                                echo "<p>- {$row['comment']}</p>";
                            }
                        }
                    } else {
                        echo "<p>Post not found.</p>";
                    }
                    ?>
                </p>
                <a href="http://spaceipsum.com/">Space Ipsum</a>
                &middot; Images by
                <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                </p>
            </div>
        </div>
    </div>
</article>
