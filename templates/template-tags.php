<?php

/** 
* Function to Render a Single Team Member Card
*/

function the_team_member_card (int $member_id) {

    $mypods = pods('team_member' , $member_id);
    if ($mypods)
    {
        $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( $member_id , 'large' ));

        if ( !empty($thumb_url)) { ?>

            <div class="proto-team-member-card">
                <a href="<?php echo get_permalink($member_id); ?> ">
                    <div class = "proto-thumb-container">
                        <div class = "proto-thumb" style="background-image: url( <?php echo $thumb_url[0]; ?> )"></div> 
                    </div>
          
                    <h5> <?php echo get_the_title($member_id); ?> </h5>
                    <p>  <?php echo $mypods->display('professional_title'); ?>  </p>
                </a>
            </div>

            <?php          
        }
    }
}

function the_policy_proposal_card (int $pp_id, bool $show_tags = true) 
{
    $mypods = pods('policy_proposal', $pp_id);
    if ($mypods)
    {
        $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( $pp_id , 'large' ));
        $dat = date_create_from_format('Y-m-d H:s', $mypods->display('post_date') );
        $pol_sector = $mypods->display('polsector');

        echo '<a class="no-underline" href="' . $mypods->display('permalink') .'" >';
        echo '<div class="proto-ppcard">';
            if ($show_tags) {
                echo '<div class="pp-tax">' . $pol_sector . '</div>';
            }
            echo '<div class="pp-title">' . $mypods->display('title') .'</div>';
/*             echo '<HR class="proto-hr"></HR>';
 */            echo '<div class="pp-excerpt">' . $mypods->display('excerpt') . '</div>';
            echo '<HR class="proto-hr"></HR>';
            echo '<div class="pp-footer">' . date_format($dat, 'F, j, Y') . '</div>';
        echo '</div>';
        echo '</a>';

    }
}


function pc_show_taxonomy ( string $taxname )
{
    $terms = get_terms( array (
        'taxonomy' => $taxname,
        'hide_empty' => false,
        'parent' => 0,
        'orderby' => 'name',
        'order' => 'ASC',
    ) ); 

    echo '<div class="polsector-wrapper">';
    foreach ($terms as $term )
    {
        the_policy_sector_card ($term);
    }
    echo '</div>';

}

function the_policy_sector_card (Object $term) {
    ?>

        <a class="no-underline" href=" <?php echo get_term_link($term); ?> ">
        <div class="polsector-card"> 
            <div class="title"> <?php echo $term->name; ?> </div>
            <div class="count"> <?php echo count_posts_in_term($term->taxonomy, $term->slug, 'policy_proposal'); ?> 
                <div class="small-caps"> ΠΡΟΤΑΣΕΙΣ</div>
            </div>
        </div>
        </a>

    <?php
}

