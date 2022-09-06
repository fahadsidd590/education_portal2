<?php
class LMS
{
    public static function response(string $status, string $title, string $message, int $code, array $data = [], bool $iserror = false, string $log = "")
    {
        if ($status) {
            $statusText = "success";
        } else {
            $statusText = "danger";
        }
        return array("status" => $status, "statustext" => $statusText, "title" => $title, "message" => $message, "code" => $code, "data" => $data, "iserror" => $iserror, "log" => $log);
    }

    public static function throw_response(array $resp, string $locate, bool $isform = false, string $formRoute = '')
    {
        global $DIR;
        global $POST_R;
        global $_ACT_TOKENS;
        $throw = $resp;
        $throw['url'] = $locate;
        $_SESSION['thrown_resp'] = $throw;
        if (!$isform) {
            header("Location: {$throw['url']}");
        } else {
            if ($formRoute != '') {
?>
                <form id="thrfm22" action="<?php echo "{$DIR}{$POST_R['communicator']}"; ?>" method="POST">
                    <input type="hidden" name="json_response" value='<?php echo base64_encode(json_encode($_SESSION['thrown_resp'])); ?>' />
                    <input type="hidden" name="url" value="<?php echo $throw['url']; ?>">
                    <input type="hidden" name="route" value="<?php echo $formRoute; ?>">
                    <input type="hidden" name="csrf" value="<?php echo $_ACT_TOKENS['communicator'] ?>" />
                </form>
                <script>
                    document.querySelector('#thrfm22').submit();
                </script>
        <?php
                die();
            } else {
                header("Location: {$throw['url']}");
            }
        }
    }

    public static function print_response(array $thrown_resp)
    {
        $thrown_resp['unique_class'] = 'sssnotif' . rand(0, 9999999);
        ?>
        <div class="jq-toast-wrap <?php echo $thrown_resp['unique_class']; ?> top-right">
            <div class="jq-toast-single jq-has-icon jq-icon-<?php echo $thrown_resp['statustext']; ?>" style="text-align: left;">
                <span onclick="document.querySelector(`.<?php echo $thrown_resp['unique_class']; ?>`).remove();" class="close-jq-toast-single">×</span>
                <h2 class="jq-toast-heading"><?php echo $thrown_resp['title']; ?></h2>
                <?php echo $thrown_resp['message']; ?>
            </div>
        </div>
        <?php if ($thrown_resp['log']) { ?>
            <script id="notif-log">
                <?php if ($thrown_resp['status']) { ?>
                    console.log(`<?php echo $thrown_resp['log']; ?>`, '::nResp::');
                <?php } else { ?>
                    console.log(`<?php echo $thrown_resp['log']; ?>`
                            <?php echo $thrown_resp['iserror'] ? ",'::ERROR::')" : ")"; ?>; <?php } ?>
            </script>
<?php }
        unset($_SESSION['thrown_resp']);
    }
    public static function where_clause($condition, $array_where)
    {
        $FILTER = "";
        if ($condition != null) {
            if (count($array_where) > 0) {
                foreach ($array_where as $key => $value) {
                    if ($value != null) {
                        if (is_string($value)) {
                            if (strpos($value, '"')) {
                                $value = "'" . $value . "'";
                            } else {
                                $value = '"' . $value . '"';
                            }
                        } else if (is_int($value) || is_float($value)) {
                            $value = $value;
                        } else if (is_bool($value)) {
                            if ($value) {
                                $value = 1;
                            } else {
                                $value = 0;
                            }
                        } else if (is_array($value)) {
                            continue;
                        } else {
                            $value = $value;
                        }
                        $where = $FILTER == '' ? "WHERE" : $condition;
                        $FILTER .= " {$where} `{$key}` = {$value}";
                    }
                }
            }
        }
        return $FILTER;
    }
    public static function orderby($orderby, $order)
    {
        $orderstring = "";
        if ($orderby == 'none' || $orderby == null) {
            return $orderstring;
        }
        return $orderstring = " ORDER BY `{$orderby}` $order ";
    }

    public static function email($emailAddress, $mailby, array $template)
    {
        return self::response(true, "Email Sent", "Email Address Sent to Targetted Mail", 200);
    }
}
