<?php
/**
 * 本文件用来存放自定义函数
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/4
 * Time: 17:04
 */
use Illuminate\Support\Facades\DB;

// 通过ID获取用户名
function get_user_name($id) {
    $users = DB::table('users')->find($id);
    if($users)
    return $users->name;
}

// 通过ID获取栏目名称
function get_category_name($id) {
    $category = DB::table('article_categorys')->find($id);
    if($category)
    return $category->cate_name;
}

/**
 * 读取动态配置
 * @param $name
 * @param bool $clear
 * @return string
 */
function option_info($name, $clear = false)
{
    $options = cache('options');
    if (empty($options) || $clear) {
        cache()->forget('options');
        $expiresAt = \Carbon\Carbon::now()->addMinutes(1440);
        $optionsList = \App\Options::orderBy('id')->select('option_name', 'option_value')->get()->toArray();
        foreach ($optionsList as $key => $option) {
            $options[strtolower($option['option_name'])] = $option['option_value'];
        }
        cache(['options' => $options], $expiresAt);
    }
    return isset($options[$name]) ? $options[$name] : '';
}

/**
 * 格式化时间
 * @param mixed $dt / Int $timestamp / String $date / String "now"
 * @return date
 */
function format_time($dt)
{

    $format = [
        'between_one_minute' => '刚刚',
        'before_minute'      => '分钟前',
        'after_minute'       => '分钟后',
        'today'              => 'H:i',
        'yesterday'          => '昨天 H:i',
        'tomorrow'           => '明天 H:i',
        'default'            => 'n月d日 H:i',
        'diff_year'             => 'Y年n月d日 H:i',
        'error'                 => '时间显示错误'
    ];

    //创建对象
    if( is_int($dt) ) {

        $dt = Carbon\Carbon::createFromTimestamp($dt);

    } else if( ! $dt instanceof \Carbon\Carbon) {
        //错误时间
        if( $dt == '0000-00-00 00:00:00' || $dt === '0' ) return $format['error'];

        $dt = new Carbon\Carbon($dt);
    }

    $now = \Carbon\Carbon::now();

    //今天
    if( $dt->isToday() ) {

        $diff_minute = floor(abs($now->timestamp - $dt->timestamp) / 60);
        $diff_second = $now->timestamp - $dt->timestamp;

        //一小时内
        if($diff_minute < 60) {

            //一分钟内
            if($diff_second < 60 && $diff_second >= 0) return $format['between_one_minute'];

            return $diff_second < 0 ? $diff_minute.$format['after_minute'] : $diff_minute.$format['before_minute'] ;
        }

        return $dt->format($format['today']);
    }

    //昨天
    if( $dt->isYesterday() ) return $dt->format($format['yesterday']);

    //明天
    if( $dt->isTomorrow() ) return $dt->format($format['tomorrow']);

    //非今年，其他时间
    if( $dt->format('Y') !== $now->format('Y') ) return $dt->format($format['diff_year']);

    //今年，其他时间
    return $dt->format($format['default']);

}

//生成随机字符串，包含大写、小写字母、数字
function randstr($length) {
    $hash = '';
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $max = strlen($chars) - 1;
    mt_srand((double)microtime() * 1000000);
    for($i = 0; $i < $length; $i++) {
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}
//转换时间戳为常用的日期格式
function trans_time($timestamp){
    if($timestamp < 1) echo '无效的Unix时间戳';
    else return date("Y-m-d H:i:s",$timestamp);
}
//跳转函数
function url_redirect($url,$delay=''){
    if($delay == ''){
        echo "<script>window.location.href='$url'</script>";
    }else{
        echo "<meta http-equiv='refresh' content='$delay;URL=$url' />";
    }

}

/**
 * 根据文章ID截取描述 支持中文
 * @param $string
 * @param int $word
 * @return string
 */
function get_description($string, $length = 80, $etc = ''){
    if ($length == 0) return '';
    mb_internal_encoding("UTF-8");
    $string = str_replace("\n","",$string);
    $strlen = mb_strwidth($string);
    if ($strlen > $length) {
        $etclen = mb_strwidth($etc);
        $length = $length - $etclen;
        $str=''; $n = 0;
        for($i=0; $i<$length; $i++) {
            $c = mb_substr($string, $i, 1);
            $n += mb_strwidth($c);
            if ($n>$length) { break; }
            $str .= $c;
        }
        return $str.$etc;
    } else {
        return $string;
    }
}


//过滤部分标签    strip_tags过滤所有标签
function delTags($str)
{
    $farr = array(
        "/<(\/?)(script|i?frame|style|html|body|title|link|meta|form|input|embed|object|textarea|\?|\%)([^>]*?)>/isU",
        "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU"
    );
    $tarr = array(
        "",
        ""
    );
    $str = preg_replace( $farr,$tarr,$str);
    return $str;
}
