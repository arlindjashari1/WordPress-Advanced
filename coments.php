<?php
/** 
 * @package WordPress
 * @subpackage WP Devs
 * @since WP Devs 1.0 
 */

if(post_password_reqiured() ){
    return;
}
?>

<div id="comments" class="comments-area">

<?php  if(have_comments() ); ?>
<h2 class=" comments-title">
    <?php
    $comments_number = get_comments_number();
    if('1'=== $comments_number){
        printf(_x( 'One thought on &lidquo;%s&rdquo;' , 'comments tittle', 'twentysixteen') , get_the_title() );
    }else{
        printf(
            _nx(
                '%1$s thought on &ldquo;%2s&rdquo;',
                '%1$s thought on &ldquo;%2s&rdquo;',
                $comments_number,
                'comments title',
                'twentysixteen'
            ),
             number_format_i18n($comments_number),
             get_the_title()
        );
    }
    ?>
</h2>

<?php the_comments_navigation(); ?>

<ol class="comment-list">
    <?php
    wp_list_comments(
        array(
            'style' => 'ol',
            'short_ping' =>true,
            'avatar_size' =>42,
        )
        );
    ?>
</ol>

<?php the_comments_navigation(); ?>

<?php endif; ?>

<?php 
if( ! comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')):
?>
<p class="no-comments"><?php  _e('comment are closed.', 'twentysixteen') ?> </p>

<?php endif; ?>

<?php
comment_form(
    array(
        'title_replay_before' => '<h2 id="reply-title" class="comment-reply-tittle">',
        'title_replay_after' => '</h2>',
    )
    );
?>

</div> 