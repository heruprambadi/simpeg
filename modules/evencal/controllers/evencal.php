<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Installation script for
 *
 * @author No-CMS Module Generator
 */
class evencal extends CMS_Priv_Strict_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Evencal_model','evencal');
        $this->load->library('calendar', $this->_setting());
    }

  /*  protected function do_override_url_map($URL_MAP){
        $module_path = $this->cms_module_path();
        $navigation_name = $this->cms_complete_navigation_name('index');
        $URL_MAP[$module_path.'/'.$module_path] = $navigation_name;
        $URL_MAP[$module_path] = $navigation_name;
        return $URL_MAP;
    }
    */
    function index($year = null, $month = null, $day = null){
        error_reporting(0);
        $year  = (empty($year) || !is_numeric($year))?  date('Y') :  $year;
        $month = (is_numeric($month) &&  $month > 0 && $month < 13)? $month : date('m');
        $day   = (is_numeric($day) &&  $day > 0 && $day < 31)?  $day : date('d');
        
        $date      = $this->evencal->getDateEvent($year, $month);
        $cur_event = $this->evencal->getEvent($year, $month, $day);
        $data      = array(
                        'notes' => $this->calendar->generate($year, $month, $date),
                        'year'  => $year, 
                        'mon'   => $month,
                        'month' => $this->_month($month),
                        'day'   => $day,
                        'events'=> $cur_event
                    );
        $this->view('/index', $data, 'evencal_index');
    }


    
    // for convert (int) month to (string) month in Indonesian
    function _month($month){
        $month = (int) $month;
        switch($month){
            case 1 : $month = 'Januari'; Break;
            case 2 : $month = 'Februari'; Break;
            case 3 : $month = 'Maret'; Break;
            case 4 : $month = 'April'; Break;
            case 5 : $month = 'Mei'; Break;
            case 6 : $month = 'Juni'; Break;
            case 7 : $month = 'Juli'; Break;
            case 8 : $month = 'Agustus'; Break;
            case 9 : $month = 'September'; Break;
            case 10 : $month = 'Oktober'; Break;
            case 11 : $month = 'November'; Break;
            case 12 : $month = 'Desember'; Break;
        }
        return $month;
    }
    
    // get detail event for selected date
    function detail_event(){        
        $this->form_validation->set_rules('year', 'Year', 'trim|required|is_natural_no_zero|xss_clean');
        $this->form_validation->set_rules('mon', 'Month', 'trim|required|is_natural_no_zero|less_than[13]|xss_clean');
        $this->form_validation->set_rules('day', 'Day', 'trim|required|is_natural_no_zero|less_than[32]|xss_clean');
        
        if ($this->form_validation->run() == FALSE){
            echo json_encode(array('status' => false, 'title_msg' => 'Error', 'msg' => 'Please insert valid value'));
        }else{
            $data = $this->evencal->getEvent($this->input->post('year'), $this->input->post('mon'), $this->input->post('day'));
            if($data == null){
                echo json_encode(array('status' => false, 'title_msg' => 'No Event', 'msg' => 'There\'s no event in this date'));
            }else{          
                echo json_encode(array('status' => true, 'data' => $data));
            }
        }
    }
    
    // popup for adding event
    function add_event(){
        $data = array(
                    'day'   => $this->input->post('day'),
                    'mon'   => $this->input->post('mon'),
                    'month' => $this->_month($this->input->post('mon')),
                    'year'  => $this->input->post('year'),
                );
        $this->view('/add_event', $data, 'evencal_add_event');
    }
    
    // do adding event for selected date
    function do_add(){
        $this->form_validation->set_rules('year', 'Year', 'trim|required|is_natural_no_zero|xss_clean');
        $this->form_validation->set_rules('mon', 'Month', 'trim|required|is_natural_no_zero|less_than[13]|xss_clean');
        $this->form_validation->set_rules('day', 'Day', 'trim|required|is_natural_no_zero|less_than[32]|xss_clean');
        $this->form_validation->set_rules('hour', 'Hour', 'trim|required|xss_clean');
        $this->form_validation->set_rules('minute', 'Minute', 'trim|required|xss_clean');
        $this->form_validation->set_rules('event', 'Event', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE){
            echo json_encode(array('status' => false, 'title_msg' => 'Error', 'msg' => 'Please insert valid value'));
        }else{
            $this->evencal->addEvent($this->input->post('year'), 
                                             $this->input->post('mon'), 
                                             $this->input->post('day'), 
                                             $this->input->post('hour').":".$this->input->post('minute').":00",
                                             $this->input->post('event'));
            echo json_encode(array('status' => true, 'time' => $this->input->post('time'), 'event' => $this->input->post('event')));
        }
    }
    
    // delete event
    function delete_event(){
        $this->form_validation->set_rules('year', 'Year', 'trim|required|is_natural_no_zero|xss_clean');
        $this->form_validation->set_rules('mon', 'Month', 'trim|required|is_natural_no_zero|less_than[13]|xss_clean');
        $this->form_validation->set_rules('day', 'Day', 'trim|required|is_natural_no_zero|less_than[32]|xss_clean');
        $this->form_validation->set_rules('del', 'ID', 'trim|required|is_natural_no_zero|xss_clean');
        
        if ($this->form_validation->run() == FALSE){
            echo json_encode(array('status' => false));
        }else{
            $rows = $this->evencal->deleteEvent($this->input->post('year'),$this->input->post('mon'),$this->input->post('day'), $this->input->post('del'));
            if($rows > 0){
                echo json_encode(array('status' => true, 'row' => $rows));
            }else{
                echo json_encode(array('status' => true, 'row' => $rows, 'title_msg' => 'No Event', 'msg' => 'There\'s no event in this date'));
            }
        }
    }
    
    // same as index() function
    function detail($year = null, $month = null, $day = null){
        error_reporting(0);
        $year  = (empty($year) || !is_numeric($year))?  date('Y') :  $year;
        $month = (is_numeric($month) &&  $month > 0 && $month < 13)? $month : date('m');
        $day   = (is_numeric($day) &&  $day > 0 && $day < 31)?  $day : date('d');
        
        $date      = $this->evencal->getDateEvent($year, $month);
        $cur_event = $this->evencal->getEvent($year, $month, $day);
        $data      = array(
                        'notes' => $this->calendar->generate($year, $month, $date),
                        'year'  => $year,
                        'mon'   => $month,
                        'month' => $this->_month($month),
                        'day'   => $day,
                        'events'=> $cur_event
                    );
        $this->view('/index', $data, 'evencal_detail');
    }
    
    // setting for calendar
    function _setting(){
        return array(
            'start_day'         => 'monday',
            'show_next_prev'    => true,
            'next_prev_url'     => site_url('/evencal/evencal/index'),
            'month_type'        => 'long',
            'day_type'          => 'short',
            'template'          => '{table_open}<table class="date">{/table_open}
                                   {heading_row_start}&nbsp;{/heading_row_start}
                                   {heading_previous_cell}<caption><a href="{previous_url}" class="prev_date" title="Previous Month">&lt;&lt;Prev</a>{/heading_previous_cell}
                                   {heading_title_cell}{heading}{/heading_title_cell}
                                   {heading_next_cell}<a href="{next_url}" class="next_date"  title="Next Month">Next&gt;&gt;</a></caption>{/heading_next_cell}
                                   {heading_row_end}<col class="weekday" span="5"><col class="weekend_sat"><col class="weekend_sun">{/heading_row_end}
                                   {week_row_start}<thead><tr>{/week_row_start}
                                   {week_day_cell}<th>{week_day}</th>{/week_day_cell}
                                   {week_row_end}</tr></thead><tbody>{/week_row_end}
                                   {cal_row_start}<tr>{/cal_row_start}
                                   {cal_cell_start}<td>{/cal_cell_start}
                                   {cal_cell_content}<div class="date_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">{content}</span></div>{/cal_cell_content}
                                   {cal_cell_content_today}<div class="active_date_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">{content}</span></div>{/cal_cell_content_today}
                                   {cal_cell_no_content}<div class="no_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">&nbsp;</span></div>{/cal_cell_no_content}
                                   {cal_cell_no_content_today}<div class="active_no_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">&nbsp;</span></div>{/cal_cell_no_content_today}
                                   {cal_cell_blank}&nbsp;{/cal_cell_blank}
                                   {cal_cell_end}</td>{/cal_cell_end}
                                   {cal_row_end}</tr>{/cal_row_end}
                                   {table_close}</tbody></table>{/table_close}');
    }
}