<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JS Date Picker</title>

<link rel="stylesheet" type="text/css" media="all" href="jsdatepicker/jsDatePick_ltr.css" />
<script type="text/javascript" src="jsdatepicker/jsDatePick.full.1.3.js"></script>
</head>

<body>


<div id="adivman">test</div> 
<script type="text/javascript">
g_calendarObject = new JsDatePick({
        useMode:1,
        isStripped:true,
        target:"adivman",
	  cellColorScheme:"armygreen"
    });
    
    g_calendarObject.setOnSelectedDelegate(function(){
        var obj = g_calendarObject.getSelectedDay();
    
        alert("a date was just selected and the date is : " + obj.day + "/" + obj.month + "/" + obj.year);
    });
</script>
</body>
</html>
