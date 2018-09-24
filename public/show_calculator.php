<?php
$options = get_option('bb_data');

?>
<section id="bb_calculator" v-cloak>


    <div class="js-accordion">
        <article class="accordion__item js-accordion-item active">
            <div class="accordion-header js-accordion-header" id="in_tab"><h2 class="bb_calculator_menu">Money coming in</h2></div>
            <div class="accordion-body  js-accordion-body">
                <div class="cont accordion-body__contents">
                    <?php
                    if ($options) {
                        echo '<ul class="top">';
                        echo '<li class="first"></li>';
                        echo '<li class="second">How much</li>';
                        echo '<li >Weekly/Monthly/Yearly</li>';
                        echo '<li class="fourth">Useful information</li>';
                        echo '</ul>';

                        echo '<ul id="m_in_calc">';
                        foreach ($options as $i => $opt) {
                            if ($opt['department'] == 'coming-in'):
                                echo '<li>';

                                echo '<span class="title">' . $opt['title'] . '</span>';
                                echo '<span ><input type="number" name="number" id="number_'.$i.'" data-id="'.$i.'" class="number"/></span>';
                                echo '<span >
                                <input type="hidden" name="final_number" id="final_number_'.$i.'" class="final_number"/>
  <select class="opt" data-id="'.$i.'" >
    <option value="weekly">Weekly</option>
    <option value="monthly" selected>Monthly</option>
    <option value="yearly">Yearly</option>
  </select>
  </span>

';
                                echo '<span class="short_info right">' . $opt['short_info'] . '
                                <div class="tooltip ">
                                <p>'.$opt['long_info'].($opt['url'] ? '<br/><a href="'.$opt['url'].'">Learn more</a>' : '').'</p>
                                </div></span>';

                                echo '</li>';
                            endif;
                        }

                        echo '</ul>';
                    }
                    echo '<ul class="total">';
                    echo '<li>Total</li>';
                    echo '<li><p class="results">£ <span id="in">0</span> Monthly</p></li>';
                    echo '</ul>';
                    ?>
                </div>
            </div>
        </article>

        <article class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header" id="out_tab"><h2 class="bb_calculator_menu">Money going out</h2></div>
            <div class="accordion-body js-accordion-body">
                <div class="cont accordion-body__contents">
<?php
                    if ($options) {
                        echo '<ul class="top">';
                        echo '<li class="first"></li>';
                        echo '<li class="second">How much</li>';
                        echo '<li >Weekly/Monthly/Yearly</li>';
                        echo '<li class="fourth">Useful information</li>';
                        echo '</ul>';

                        echo '<ul id="m_out_calc">';
                        foreach ($options as $i => $opt) {
                            if ($opt['department'] == 'going-out'):
                                echo '<li>';

                                echo '<span class="title">' . $opt['title'] . '</span>';
                                echo '<span><input type="number" name="number" id="numberout_'.$i.'" data-id="'.$i.'" class="number_out"/></span>';
                                echo '<span>
                                <input type="hidden" name="final_number" id="final_numberout_'.$i.'" class="final_number_out"/>
  <select class="opt" data-id="'.$i.'" >
    <option value="weekly">Weekly</option>
    <option value="monthly" selected>Monthly</option>
    <option value="yearly">Yearly</option>
  </select>
  </span>

';
                                echo '<span class="short_info right">' . $opt['short_info'] . '
                                <div class="tooltip ">
                                <p>'.$opt['long_info'].($opt['url'] ? '<br/><a href="'.$opt['url'].'">Learn more</a>' : '').'</p>
                                </div></span>';

                                echo '</li>';
                            endif;
                        }

                        echo '</ul>';
                    }
                    echo '<ul class="total">';
                    echo '<li>Total</li>';
                    echo '<li><p class="results">£ <span id="out">0</span> Monthly</p></li>';
                    echo '</ul>';
?>
                </div>
            </div>

        </article>
        <article class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header" id="left-item"><h2 class="bb_calculator_menu">What's left</h2></div>
            <div class="accordion-body js-accordion-body">
                <div class="cont wleft accordion-body__contents text-center">

                    <ul class="total">
                        <li></li>
                        <li><p class="results">£ <span id="left_out">0</span> Monthly</p></li>
                    </ul>

                    <h3>Need to boost the coffers?</h3>
                    <p>
                        We may be able to help! Click the button to see if we could put some extra cash in your pocket.
                    </p>

                    <a class="apply-button" href="https://www.buddyloans.com/apply-now" rel="noopener" target="_blank">Apply now</a>
                </div>
            </div>
        </article>

    </div>


</section>
