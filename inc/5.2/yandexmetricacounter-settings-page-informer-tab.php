<?php if ($this->store->site_id) : ?>
<script> var yandexmetrica_site_id = '<?php echo $this->store->site_id; ?>'; </script>
<?php endif; ?>

<form method="post" action="options.php">
            <?php settings_fields($this->plugin_slug); ?>
            <input type="hidden" name="wordefinery[__section__]" value="<?php echo $this->plugin_slug; ?>" />
            <input type="hidden" name="wordefinery[informer][align]" value="<?php echo $this->informer->align; ?>" id="<?php echo $this->plugin_slug; ?>-align" />
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php wr__e('Display informer') ?></th>
                    <td>
                    <input type="hidden" name="wordefinery[informer][show]" value="0" />
                    <label><input type="checkbox" name="wordefinery[informer][show]" value="1" <?php \checked('1', $this->informer->show); ?> id="<?php echo $this->plugin_slug; ?>-show_informer" />
                    <?php wr__e('Enable') ?></label><br/>
                    <?php wr__e('It may take some time for the informer to become active.') ?>
                    </td>
                </tr>
            </table>
            <div style="position:relative; opacity:0.3" id="<?php echo $this->plugin_slug; ?>-customize">
            <div style="position:absolute; margin: 6px 0; height:100%; width:100%; z-index:100; background-color:#000000; opacity:0.1">
            </div>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php wr__e('Customize informer') ?></th>
                    <td>
                    <div id="<?php echo $this->plugin_slug; ?>-preview">
                    <div class="align">
                    <a name="left"><?php wr__e('Left') ?></a>
                    <a name="center"><?php wr__e('Center') ?></a>
                    <a name="right"><?php wr__e('Right') ?></a>
                    </div>
                    <div class="preview">
                        <img src="" />
                    </div>
                    </div>

                    <div id="<?php echo $this->plugin_slug; ?>-settings">

                    <div class="selector size">
                    <h1><?php wr__e('Informer size') ?></h1>
                    <?php foreach ($this->size_idx as $i=>$s) : ?>
                    <?php list($w, $h) = explode('x', $s); ?>
                    <label><input type="radio" name="wordefinery[informer][size]" value="<?php echo $i; ?>" <?php \checked($i, $this->informer->size); ?> >
                    <img src="<?php echo WP_PLUGIN_URL.'/'.$this->path; ?>/(img)/<?php echo $s; ?>.png" width="<?php echo $w; ?>" height="<?php echo $h; ?>" alt="<?php echo $s; ?>" />
                    </label>
                    <?php endforeach; ?>
                    </div>

                    <div class="selector color-top">
                    <h1><?php wr__e('Color') ?></h1>
                    <input type="text" name="wordefinery[informer][color_top]" value="<?php echo $this->informer->color_top; ?>" id="<?php echo $this->plugin_slug; ?>-color_top" size="7" />
                	<a href="#" class="color-top-pick hide-if-no-js"></a>
	                <input type="button" class="color-top-pick button hide-if-no-js" value="<?php wr__e( 'Select a Color' ); ?>" />
                	<div class="color-top-picker" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
                    </div>

                    <div class="selector alpha-top">
                    <h1><?php wr__e('Opacity') ?></h1>
                    <input type="text" name="wordefinery[informer][alpha_top]" value="<?php echo $this->informer->alpha_top; ?>" id="<?php echo $this->plugin_slug; ?>-alpha_top" size="7" />
                    <div class="slider"></div>
                    </div>

                    <div class="selector gradient">
                    <h1><?php wr__e('Gradient') ?></h1>
                    <input type="text" name="wordefinery[informer][gradient]" value="<?php echo $this->informer->gradient; ?>" id="<?php echo $this->plugin_slug; ?>-gradient" size="7" />
                    <div class="slider"></div>
                    </div>

                    <div class="selector text">
                    <h1><?php wr__e('Text color') ?></h1>
                    <label><input type="radio" name="wordefinery[informer][text]" value="0" <?php \checked(0, $this->informer->text); ?> />
                    <?php wr__e('Black') ?></label>
                    <label><input type="radio" name="wordefinery[informer][text]" value="1" <?php \checked(1, $this->informer->text); ?> />
                    <?php wr__e('White') ?></label>
                    </div>

                    <div class="selector arrow">
                    <h1><?php wr__e('Arrow color') ?></h1>
                    <label><input type="radio" name="wordefinery[informer][arrow]" value="0" <?php \checked(0, $this->informer->arrow); ?> />
                    <?php wr__e('Gray') ?></label>
                    <label><input type="radio" name="wordefinery[informer][arrow]" value="1" <?php \checked(1, $this->informer->arrow); ?> />
                    <?php wr__e('Violet') ?></label>
                    </div>

                    <div class="selector info">
                    <h1><?php wr__e('Counter info') ?></h1>
                    <label><input type="radio" name="wordefinery[informer][info]" value="pageviews" <?php \checked('pageviews', $this->informer->info); ?> />
                    <?php wr__e('Page views') ?></label>
                    <label><input type="radio" name="wordefinery[informer][info]" value="visits" <?php \checked('visits', $this->informer->info); ?> />
                    <?php wr__e('Visits') ?></label>
                    <label><input type="radio" name="wordefinery[informer][info]" value="uniques" <?php \checked('uniques', $this->informer->info); ?> />
                    <?php wr__e('Visitors') ?></label>
                    </div>

                    </div>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php wr__e('Informer type') ?></th>
                    <td>
                    <label><input type="radio" name="wordefinery[informer][type]" value="0" <?php \checked('0', $this->informer->type); ?> />
                    <?php wr__e('Simple') ?></label><br/>
                    <label><input type="radio" name="wordefinery[informer][type]" value="1" <?php \checked('1', $this->informer->type); ?> />
                    <?php wr__e('Advanced') ?></label><br/>
                    <?php wr__e('Allows to see the information window with statistics when clicking on the informer.'); ?>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php wr__e('Mode') ?></th>
                    <td>
                    <label><input type="radio" name="wordefinery[informer][mode]" value="widget" <?php \checked('widget', $this->informer->mode); ?> />
                    <?php wr__e('Widget') ?></label><br/>
                    <label><input type="radio" name="wordefinery[informer][mode]" value="footer" <?php \checked('footer', $this->informer->mode); ?> />
                    <?php wr__e('Footer') ?></label><br/>
                    <label><input type="radio" name="wordefinery[informer][mode]" value="shortcode" <?php \checked('shortcode', $this->informer->mode); ?> />
                    <?php wr__e('Shortcode') ?></label> <code>[metricacounter]</code><br/>
                    <code>&lt;?php do_shortcode('[metricacounter]') ?&gt;</code> &mdash; <i><?php wr__e('Use this code in your template') ?></i><br/>
                    </td>
                </tr>
            </table>
            </div>

<p class="submit">
    <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>
</form>

<img src="http://wordefinery.com/i/yandexmetrica-counter.gif?wp=<?php echo $GLOBALS['wp_version']; ?>&v=<?php echo self::VERSION; ?>" width="1" height="1" border="0" alt="" />
</div>
