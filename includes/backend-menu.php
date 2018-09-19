<form method="post" action="options.php">
    <?php settings_fields( 'calculator-group' ); ?>
    <?php do_settings_sections( 'calculator-group' ); ?>
    <div id="options">
        <?php
        $options = get_option( 'bb_data' );

        foreach($options as $i=>$opt){

            ?>
            <p>
                <select id="pet-select" name="bb_data[<?= $i ?>][department]">
                    <option value="">--Please choose--</option>
                    <option <?php $opt['department'] == 'coming-in'? print 'selected':null; ?> value="coming-in">Money Coming In</option>
                    <option <?php $opt['department'] == 'going-out'? print 'selected':null; ?> value="going-out">Money Going Out</option>
                </select>
                <label for="title">
                    <input type="text" name="bb_data[<?= $i ?>][title]" value="<?= $opt['title'] ?>" placeholder="Title"/>
                </label>
                <label for="short_info">
                    <input type="text" name="bb_data[<?= $i ?>][short_info]" value="<?= $opt['short_info'] ?>" placeholder="Short Info"/>
                </label>
                <label for="long_info">
                    <textarea name="bb_data[<?= $i ?>][long_info]" placeholder="Long info" rows="4" cols="50"><?= $opt['long_info'] ?></textarea>
                </label>
                <label for="url">
                    <input type="text" name="bb_data[<?= $i ?>][url]" value="<?= $opt['url'] ?>" placeholder="Url address"/>
                </label>
                <a href="#" id="remScnt">Remove</a>
            </p>
        <?php
        }

        ?>
    </div>
    <a href="#" id="addScnt" class="button button-primary orange-bg">Add new field</a>
    <?php submit_button(); ?>
</form>
