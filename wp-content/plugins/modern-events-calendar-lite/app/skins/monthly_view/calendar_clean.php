<?php
/** no direct access **/
defined('MECEXEC') or die();

// table headings
$headings = $this->main->get_weekday_abbr_labels();
echo '<dl class="mec-calendar-table-head"><dt class="mec-calendar-day-head">'.implode('</dt><dt class="mec-calendar-day-head">', $headings).'</dt></dl>';

// Start day of week
$week_start = $this->main->get_first_day_of_week();

$this->localtime = isset($this->skin_options['include_local_time']) ? $this->skin_options['include_local_time'] : false;
$display_label = isset($this->skin_options['display_label']) ? $this->skin_options['display_label'] : false;
$reason_for_cancellation = isset($this->skin_options['reason_for_cancellation']) ? $this->skin_options['reason_for_cancellation'] : false;

// Single Event Display Method
$target_set = isset($this->skin_options['sed_method']) ? $this->skin_options['sed_method'] : false;
$target_url = ($target_set == 'new') ? 'target="_blank"' : '';

// days and weeks vars
$running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
$days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
$days_in_previous_month = date('t', strtotime('-1 month', strtotime($this->active_day)));

$days_in_this_week = 1;
$day_counter = 0;
$styles_str = '';

if($week_start == 0) $running_day = $running_day; // Sunday
elseif($week_start == 1) // Monday
{
    if($running_day != 0) $running_day = $running_day - 1;
    else $running_day = 6;
}
elseif($week_start == 6) // Saturday
{
    if($running_day != 6) $running_day = $running_day + 1;
    else $running_day = 0;
}
elseif($week_start == 5) // Friday
{
    if($running_day < 4) $running_day = $running_day + 2;
    elseif($running_day == 5) $running_day = 0;
    elseif($running_day == 6) $running_day = 1;
}

$events_str = '';
?>
<dl class="mec-calendar-row">
    <?php
        // print "blank" days until the first of the current week
        for($x = 0; $x < $running_day; $x++)
        {
            $list_day = ($days_in_previous_month - ($running_day-1-$x));
            $time = strtotime(($month == 1 ? ($year - 1) : $year).'-'.($month == 1 ? 12 : ($month - 1)).'-'.$list_day);

            $today = date('Y-m-d', $time);
            $day_id = date('Ymd', $time);
            $selected_day = (str_replace('-', '', $this->active_day) == $day_id) ? ' mec-selected-day' : '';

            // Print events
            if(isset($events[$today]) and count($events[$today]))
            {
                echo '<dt class="mec-calendar-day mec-has-event'.$selected_day.'" data-mec-cell="'.$day_id.'" data-day="'.$list_day.'" data-month="'.date('Ym', strtotime($year.'-'.$month.'-01')).'"><a href="#" class="mec-has-event-a">'.$list_day.'</a></dt>';
                $events_str .= '<div class="mec-calendar-events-sec" data-mec-cell="'.$day_id.'" '.(trim($selected_day) != '' ? ' style="display: block;"' : '').'>'.$this->day_label($time);

                foreach($events[$today] as $event)
                {
                    $location = isset($event->data->locations[$event->data->meta['mec_location_id']])? $event->data->locations[$event->data->meta['mec_location_id']] : array();
                    $start_time = (isset($event->data->time) ? $event->data->time['start'] : '');
                    $end_time = (isset($event->data->time) ? $event->data->time['end'] : '');
                    $startDate = !empty($event->data->meta['mec_date']['start']['date'] ) ? $event->data->meta['mec_date']['start']['date'] : '';
                    $endDate = !empty($event->data->meta['mec_date']['end']['date'] ) ? $event->data->meta['mec_date']['end']['date'] : '' ;
                    $event_start_date = !empty($event->date['start']['date']) ? $event->date['start']['date'] : '';

                    $label_style = '';
                    if(!empty($event->data->labels))
                    {
                        foreach($event->data->labels as $label)
                        {
                            if(!isset($label['style']) or (isset($label['style']) and !trim($label['style']))) continue;
                            if($label['style'] == 'mec-label-featured') $label_style = esc_html__('Featured' , 'modern-events-calendar-lite');
                            elseif($label['style'] == 'mec-label-canceled') $label_style = esc_html__('Canceled' , 'modern-events-calendar-lite');
                        }
                    }

                    $events_filter = $after_time_filter = '';

                    // MEC Schema
                    $events_str .= apply_filters('mec_schema_text', '', $event);

                    $events_str .= '<article data-style="'.$label_style.'" class="'.((isset($event->data->meta['event_past']) and trim($event->data->meta['event_past'])) ? 'mec-past-event ' : '').'mec-event-article '.$this->get_event_classes($event).'">';
                    $events_str .= '<div class="mec-event-image">'.$event->data->thumbnails['thumblist'].'</div>';

                    if(trim($start_time)) $events_str .= '<div class="mec-event-time mec-color"><i class="mec-sl-clock-o"></i> '.$start_time.(trim($end_time) ? ' - '.$end_time : '').'</div>';
                    if(has_filter('monthly_event_after_time')) $after_time_filter = apply_filters('monthly_event_after_time', $events_str, $event);

                    $events_str .= $after_time_filter;
                    $event_color = isset($event->data->meta['mec_color'])?'<span class="event-color" style="background: #'.$event->data->meta['mec_color'].'"></span>':'';
                    $events_str .= '<h4 class="mec-event-title"><a class="mec-color-hover" data-event-id="'.$event->data->ID.'" href="'.$this->main->get_event_date_permalink($event, $event->date['start']['date']).'" '.$target_url.'>'.$event->data->title.'</a>'.$this->main->get_flags($event).$event_color.$this->main->get_normal_labels($event, $display_label).$this->main->display_cancellation_reason($event, $reason_for_cancellation);
                    if(has_filter('mec_monthly_virtual_badge')) $events_str .= apply_filters('mec_monthly_virtual_badge', $events_str, $event->data->ID);
                    $events_str .='</h4>';
                    if($this->localtime) $events_str .= $this->main->module('local-time.type3', array('event'=>$event));
                    $events_str .= '<div class="mec-event-detail"><div class="mec-event-loc-place">'.(isset($location['name']) ? $location['name'] : '').'</div></div>';
                    $events_str .= $this->booking_button($event);

                    if($this->display_price and isset($event->data->meta['mec_cost']) and $event->data->meta['mec_cost'] != '')
                    {
                        $events_str .= '<div class="mec-price-details">
                            <i class="mec-sl-wallet"></i>
                            <span>'.(is_numeric($event->data->meta['mec_cost']) ? $this->main->render_price($event->data->meta['mec_cost']) : $event->data->meta['mec_cost']).'</span>
                        </div>';
                    }

                    if(has_filter('monthly_event_right_box')) $events_filter = apply_filters('monthly_event_right_box', $events_str, $event);

                    $events_str .= $events_filter;
                    $events_str .= '</article>';
                }

                $events_str .= '</div>';
            }
            else
            {
                echo '<dt class="mec-table-nullday">'.$list_day.'</dt>';
            }

            $days_in_this_week++;
        }
        
        // keep going with days ....
        for($list_day = 1; $list_day <= $days_in_month; $list_day++)
        {
            $time = strtotime($year.'-'.$month.'-'.$list_day);

            $today = date('Y-m-d', $time);
            $day_id = date('Ymd', $time);
            $selected_day = (str_replace('-', '', $this->active_day) == $day_id) ? ' mec-selected-day' : '';

            // Print events
            if(isset($events[$today]) and count($events[$today]))
            {
                echo '<dt class="mec-calendar-day mec-has-event'.$selected_day.'" data-mec-cell="'.$day_id.'" data-day="'.$list_day.'" data-month="'.date('Ym', $time).'"><a href="#" class="mec-has-event-a">'.$list_day.'</a></dt>';
                $events_str .= '<div class="mec-calendar-events-sec" data-mec-cell="'.$day_id.'" '.(trim($selected_day) != '' ? ' style="display: block;"' : '').'>'.$this->day_label($time);
                
                foreach($events[$today] as $event)
                {
                    $location = isset($event->data->locations[$event->data->meta['mec_location_id']])? $event->data->locations[$event->data->meta['mec_location_id']] : array();
                    $start_time = (isset($event->data->time) ? $event->data->time['start'] : '');
                    $end_time = (isset($event->data->time) ? $event->data->time['end'] : '');
                    $startDate = !empty($event->data->meta['mec_date']['start']['date'] ) ? $event->data->meta['mec_date']['start']['date'] : '';
                    $endDate = !empty($event->data->meta['mec_date']['end']['date'] ) ? $event->data->meta['mec_date']['end']['date'] : '' ;
                    $event_start_date = !empty($event->date['start']['date']) ? $event->date['start']['date'] : '';
                    
                    $label_style = '';
                    if(!empty($event->data->labels))
                    {
                        foreach($event->data->labels as $label)
                        {
                            if(!isset($label['style']) or (isset($label['style']) and !trim($label['style']))) continue;
                            if($label['style'] == 'mec-label-featured') $label_style = esc_html__('Featured' , 'modern-events-calendar-lite');
                            elseif($label['style'] == 'mec-label-canceled') $label_style = esc_html__('Canceled' , 'modern-events-calendar-lite');
                        }
                    }

                    $events_filter = $after_time_filter = '';

                    // MEC Schema
                    $events_str .= apply_filters('mec_schema_text', '', $event);

                    $events_str .= '<article data-style="'.$label_style.'" class="'.((isset($event->data->meta['event_past']) and trim($event->data->meta['event_past'])) ? 'mec-past-event ' : '').'mec-event-article '.$this->get_event_classes($event).'">';
                    $events_str .= '<div class="mec-event-image">'.$event->data->thumbnails['thumblist'].'</div>';

                    if(trim($start_time)) $events_str .= '<div class="mec-event-time mec-color"><i class="mec-sl-clock-o"></i> '.$start_time.(trim($end_time) ? ' - '.$end_time : '').'</div>';
                    if(has_filter('monthly_event_after_time')) $after_time_filter = apply_filters('monthly_event_after_time', $events_str, $event);

                    $events_str .= $after_time_filter;
                    $event_color = isset($event->data->meta['mec_color'])?'<span class="event-color" style="background: #'.$event->data->meta['mec_color'].'"></span>':'';
                    $events_str .= '<h4 class="mec-event-title"><a class="mec-color-hover" data-event-id="'.$event->data->ID.'" href="'.$this->main->get_event_date_permalink($event, $event->date['start']['date']).'" '.$target_url.'>'.$event->data->title.'</a>'.$this->main->get_flags($event).$event_color.$this->main->get_normal_labels($event, $display_label).$this->main->display_cancellation_reason($event, $reason_for_cancellation);
                    if(has_filter('mec_monthly_virtual_badge')) $events_str .= apply_filters('mec_monthly_virtual_badge', $events_str, $event->data->ID);
                    $events_str .='</h4>';
                    if($this->localtime) $events_str .= $this->main->module('local-time.type3', array('event'=>$event));
                    $events_str .= '<div class="mec-event-detail"><div class="mec-event-loc-place">'.(isset($location['name']) ? $location['name'] : '').'</div></div>';
                    $events_str .= $this->booking_button($event);

                    if($this->display_price and isset($event->data->meta['mec_cost']) and $event->data->meta['mec_cost'] != '')
                    {
                        $events_str .= '<div class="mec-price-details">
                            <i class="mec-sl-wallet"></i>
                            <span>'.(is_numeric($event->data->meta['mec_cost']) ? $this->main->render_price($event->data->meta['mec_cost']) : $event->data->meta['mec_cost']).'</span>
                        </div>';
                    }

                    if(has_filter('monthly_event_right_box')) $events_filter = apply_filters('monthly_event_right_box', $events_str, $event);

                    $events_str .= $events_filter;
                    $events_str .= '</article>';
                }

                $events_str .= '</div>';
            }
            else
            {
                echo '<dt class="mec-calendar-day'.$selected_day.'" data-mec-cell="'.$day_id.'" data-day="'.$list_day.'" data-month="'.date('Ym', $time).'">'.$list_day.'</dt>';
                
                $events_str .= '<div class="mec-calendar-events-sec" data-mec-cell="'.$day_id.'" '.(trim($selected_day) != '' ? ' style="display: block;"' : '').'>'.$this->day_label($time);
                $events_str .= '<article class="mec-event-article">';
                $events_str .= '<div class="mec-event-detail">'.__('No Events', 'modern-events-calendar-lite').'</div>';
                $events_str .= '</article>';
                $events_str .= '</div>';
            }

            echo '</dt>';

            if($running_day == 6)
            {
                echo '</dl>';

                if((($day_counter+1) != $days_in_month) or (($day_counter+1) == $days_in_month and $days_in_this_week == 7))
                {
                    echo '<dl class="mec-calendar-row">';
                }

                $running_day = -1;
                $days_in_this_week = 0;
            }

            $days_in_this_week++; $running_day++; $day_counter++;
        }

        // finish the rest of the days in the week
        if($days_in_this_week < 8)
        {
            for($x = 1; $x <= (8 - $days_in_this_week); $x++)
            {
                $list_day = $x;
                $time = strtotime(($month == 12 ? ($year + 1) : $year).'-'.($month == 12 ? 1 : ($month + 1)).'-'.$list_day);

                $today = date('Y-m-d', $time);
                $day_id = date('Ymd', $time);
                $selected_day = (str_replace('-', '', $this->active_day) == $day_id) ? ' mec-selected-day' : '';

                // Print events
                if(isset($events[$today]) and count($events[$today]))
                {
                    echo '<dt class="mec-calendar-day mec-has-event'.$selected_day.'" data-mec-cell="'.$day_id.'" data-day="'.$list_day.'" data-month="'.date('Ym', strtotime($year.'-'.$month.'-01')).'"><a href="#" class="mec-has-event-a">'.$list_day.'</a></dt>';
                    $events_str .= '<div class="mec-calendar-events-sec" data-mec-cell="'.$day_id.'" '.(trim($selected_day) != '' ? ' style="display: block;"' : '').'>'.$this->day_label($time);

                    foreach($events[$today] as $event)
                    {
                        $location = isset($event->data->locations[$event->data->meta['mec_location_id']])? $event->data->locations[$event->data->meta['mec_location_id']] : array();
                        $start_time = (isset($event->data->time) ? $event->data->time['start'] : '');
                        $end_time = (isset($event->data->time) ? $event->data->time['end'] : '');
                        $startDate = !empty($event->data->meta['mec_date']['start']['date'] ) ? $event->data->meta['mec_date']['start']['date'] : '';
                        $endDate = !empty($event->data->meta['mec_date']['end']['date'] ) ? $event->data->meta['mec_date']['end']['date'] : '' ;
                        $event_start_date = !empty($event->date['start']['date']) ? $event->date['start']['date'] : '';

                        $label_style = '';
                        if(!empty($event->data->labels))
                        {
                            foreach($event->data->labels as $label)
                            {
                                if(!isset($label['style']) or (isset($label['style']) and !trim($label['style']))) continue;
                                if($label['style'] == 'mec-label-featured') $label_style = esc_html__('Featured' , 'modern-events-calendar-lite');
                                elseif($label['style'] == 'mec-label-canceled') $label_style = esc_html__('Canceled' , 'modern-events-calendar-lite');
                            }
                        }

                        $events_filter = $after_time_filter = '';

                        // MEC Schema
                        $events_str .= apply_filters('mec_schema_text', '', $event);

                        $events_str .= '<article data-style="'.$label_style.'" class="'.((isset($event->data->meta['event_past']) and trim($event->data->meta['event_past'])) ? 'mec-past-event ' : '').'mec-event-article '.$this->get_event_classes($event).'">';
                        $events_str .= '<div class="mec-event-image">'.$event->data->thumbnails['thumblist'].'</div>';

                        if(trim($start_time)) $events_str .= '<div class="mec-event-time mec-color"><i class="mec-sl-clock-o"></i> '.$start_time.(trim($end_time) ? ' - '.$end_time : '').'</div>';
                        if(has_filter('monthly_event_after_time')) $after_time_filter = apply_filters('monthly_event_after_time', $events_str, $event);

                        $events_str .= $after_time_filter;
                        $event_color = isset($event->data->meta['mec_color']) ? '<span class="event-color" style="background: #'.$event->data->meta['mec_color'].'"></span>' : '';

                        $events_str .= '<h4 class="mec-event-title"><a class="mec-color-hover" data-event-id="'.$event->data->ID.'" href="'.$this->main->get_event_date_permalink($event, $event->date['start']['date']).'" '.$target_url.'>'.$event->data->title.'</a>'.$this->main->get_flags($event).$event_color.$this->main->get_normal_labels($event, $display_label).$this->main->display_cancellation_reason($event, $reason_for_cancellation);
                        if(has_filter('mec_monthly_virtual_badge')) $events_str .= apply_filters('mec_monthly_virtual_badge', $events_str, $event->data->ID);
                        $events_str .='</h4>';

                        if($this->localtime) $events_str .= $this->main->module('local-time.type3', array('event'=>$event));
                        $events_str .= '<div class="mec-event-detail"><div class="mec-event-loc-place">'.(isset($location['name']) ? $location['name'] : '').'</div></div>';
                        $events_str .= $this->booking_button($event);

                        if($this->display_price and isset($event->data->meta['mec_cost']) and $event->data->meta['mec_cost'] != '')
                        {
                            $events_str .= '<div class="mec-price-details">
                                <i class="mec-sl-wallet"></i>
                                <span>'.(is_numeric($event->data->meta['mec_cost']) ? $this->main->render_price($event->data->meta['mec_cost']) : $event->data->meta['mec_cost']).'</span>
                            </div>';
                        }

                        if(has_filter('monthly_event_right_box')) $events_filter = apply_filters('monthly_event_right_box', $events_str, $event);

                        $events_str .= $events_filter;
                        $events_str .= '</article>';
                    }

                    $events_str .= '</div>';
                }
                else
                {
                    echo '<dt class="mec-table-nullday">'.$x.'</dt>';
                }
            }
        }
        
        if(trim($styles_str)) $this->factory->params('footer', '<style type="text/css">'.$styles_str.'</style>');
    ?>
</dl>
<?php if($this->style == 'classic'): ?>
<div class="mec-calendar-events-side mec-clear">
    <?php echo $events_str; ?>
</div>
<?php else:
    $this->events_str = $events_str;
endif;