<?php get_header(); ?>
<!-- /*
Template Name: Homepage
*/ -->

<?php include 'variables.php' ?>

<script>
    //grid stuff
    function revealOverlay(index) {
        const item = '#overlay-'+index.toString();
        $(item).removeClass('hidden-overlay');
    }
    function removeOverlay(index) {
        const item = '#overlay-'+index.toString();
        $(item).addClass('hidden-overlay');
    }
</script>

<body>
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-header">
        <div class="date"><?php the_time( 'M j y' ); ?></div>
        <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <div class="author"><?php the_author(); ?></div>
        </div><!--end post header-->
        <div class="entry clear">
        <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>
        <?php the_content(); ?>
        <?php edit_post_link(); ?>
        <?php wp_link_pages(); ?> </div>
        <!--end entry-->
        <div class="post-footer">
        <div class="comments"><?php comments_popup_link( 'Leave a Comment', '1 Comment', '% Comments' ); ?></div>
        </div><!--end post footer-->
        </div><!--end post-->
    <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
        <div class="navigation index">
        <div class="alignleft"><?php next_posts_link( 'Older Entries' ); ?></div>
        <div class="alignright"><?php previous_posts_link( 'Newer Entries' ); ?></div>
        </div><!--end navigation-->
    <?php else : ?>
    <?php endif; ?>

    <div id="canopy-theme" class="container">
        <div class="hero">
            <div class="blur"></div>
            <?php include('nav.php'); ?>
            <div class="main-features">
                <?php $index = -1;
                    foreach($hero_projects as $item) {
                        $index+=1;
                        echo "<img class=\"hero-image-";
                        echo $index;
                        echo "\" src=\"";
                        echo $item->desktop_image;
                        echo "\"><div class=\"active-feature hero-index-";
                        echo $index;
                        echo "\"><span>";
                        echo $item->client_name;
                        echo "</span><a href=\"";
                        echo $host . $item->url;
                        echo "\">";
                        echo  $item->title;
                        echo "</a><span>";
                        echo $item->subtitle;
                        echo "</span></div>";
                    }
                    echo "<div class=\"feat-select\">";
                        echo "<span class=\"hero-button-0\">01</span>";
                        echo "<span class=\"hero-button-1\">02</span>";
                        echo "<span class=\"hero-button-2\">03</span>";
                    echo "</div>";
                ?>
            </div>
            <div class="main-features-mobile">
                <?php $index = -1;
                    foreach($hero_projects as $item) {
                        $index+=1;
                        echo "<img class=\"hero-image-";
                        echo $index;
                        echo "\" src=\"";
                        echo $item->mobile_image;
                        echo "\"><div class=\"active-feature hero-index-";
                        echo $index;
                        echo "\"><span>";
                        echo $item->client_name;
                        echo "</span><a href=\"";
                        echo $host . $item->url;
                        echo "\">";
                        echo  $item->title;
                        echo "</a><span>";
                        echo $item->subtitle;
                        echo "</span></div>";
                    }
                    echo "<div class=\"feat-select\">";
                        echo "<span class=\"hero-button-0\">01</span>";
                        echo "<span class=\"hero-button-1\">02</span>";
                        echo "<span class=\"hero-button-2\">03</span>";
                    echo "</div>";
                ?>
            </div>
        </div>
        <div class="tag-line flex-column">
            <span>We are all things sound, music, and immersion.</span>
            <div class="link-div">
                <a onClick="location.href='<?php echo $host . "/about" ?>'">LEARN MORE</a>
            </div>
        </div>
        <div class="main">
            <div id="gridNav" class="body-header">
                <h3>Our Work</h3>
            </div>
            <div class="grid-container">
                <div class="grid"> 
                    <?php $index = -1;
                        foreach($grid as $item) {
                            $index+=1;
                            $revealClass='';
                            if($index == 2 || $index == 5 || $index == 8 || $index == 11 || $index == 14 || $index == 17 || $index == 20 || $index == 23 || $index == 26 || $index == 29 || $index == 32 ||$index == 35 ||$index == 38 ||$index == 41) {
                                $revealClass = 'grid-box-3';
                            }
                            else if($index == 1 || $index == 4 || $index == 7 || $index == 10 || $index == 13 || $index == 16 || $index == 19 || $index == 22 || $index == 25 || $index == 28 || $index == 31 ||$index == 34 ||$index == 37 ||$index == 40) {
                                $revealClass = 'grid-box-2';
                            }
                            else {
                                $revealClass = 'grid-box-1';
                            }
                                echo "<div class='resize-box ";
                                echo $revealClass;
                                echo "'><div class='grid-item' onmouseenter='revealOverlay(";
                                echo $index;
                                echo ")' onmouseleave='removeOverlay(";
                                echo $index;
                                echo")' onClick=\"location.href='";
                                echo $item->link;
                                echo  "'\"><div class='grid-item-overlay hidden-overlay' ";
                                echo "id='overlay-";
                                echo $index;
                                echo "'><span>";
                                echo $item->hover_title;
                                echo "</span><span>";
                                echo $item->client;
                                echo "</span><span>";
                                echo $item->category;
                                echo "</span></div>";
                                echo "<div class='grid-item-content'><img src='";
                                echo $item->image;
                                echo "'></div></div></div>";
                            }
                    ?>
                </div>
            </div>    
        </div>

        <div class="feature">
            <div class="feat-arrow-previous">
                <i class="fa fa-chevron-left"></i>                
            </div>
            <div class="feat-content">
                <?php $index = -1;
                    foreach($press_links as $item) {
                    $index+=1;
                    echo "<div class=\"invisible feat-img\" id=\"feat-img-";
                    echo $index;
                    echo "\"><div class=\"feat-img-div\"><img src=\"";
                    echo $item->image;
                    echo "\"></div></div>";
                    echo "<div class=\"invisible feat-text\" id=\"feat-text-";
                    echo $index;
                    echo "\">";
                    echo "<span>PRESS</span>
                        <span>";
                    echo $item->headline;
                        echo "</span>
                        <span>";
                        echo $item->subtitle;
                        echo "</span>
                        <div class=\"feat-link\">
                            <a href=\"";
                            echo $item->url;
                            echo "\">";
                            echo $item->link_title;
                            echo "</a>
                        </div>
                    </div>";
                    }
                ?>
            </div>
            <div class="feat-arrow-next">
                <i class="fa fa-chevron-right"></i>                
            </div>
        </div>

        <?php get_footer(); ?>
