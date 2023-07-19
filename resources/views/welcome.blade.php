<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
</head>

<body>
    <div class="jumbotron text-center">
        {{-- <h1>My Timesheet Page</h1> --}}
    </div>
    @php
        $req = json_decode($body);
    @endphp
    <div class="container">

        <div class="row">
            {{-- <form action="http://127.0.0.1:8000/icici/upi/payment" method="post" style="width: 100%"> --}}
            <form action="http://127.0.0.1:8000/zebicsoft/upi/payment" method="post" style="width: 100%">
            <!-- <form action="http://127.0.0.1:8000/stylemirror/upi/payment" method="post" style="width: 100%"> -->
            <!-- <form action="http://127.0.0.1:8000/zebicsoft/upi/payment" method="post" style="width: 100%"> -->
            <!-- <form action="http://192.168.2.208/project/zlichfin_admin/public/zebicsoft/upi/payment" method="post" style="width: 100%"> -->
            <!-- <form action="http://192.168.2.208/project/zlichfin_admin/public/stylemirror/upi/payment" method="post" style="width: 100%"> -->
            <!-- <form action="http://192.168.2.208/project/zlichfin_admin/public/zebicsoft/upi/payment" method="post" style="width: 100%">-->
            <!-- <form action="http://192.168.2.208/project/zlichfin_admin/public/wardrobes/upi/payment" method="post" style="width: 100%"> -->
                <div class="form-group col-xs-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $req->name }}" placeholder="Name">
                    {{-- <small id="loginTimeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group col-xs-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ $req->email }}" placeholder="Email">
                </div>
                <div class="form-group col-xs-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $req->phone }}"
                        placeholder="Phone">
                </div>
                <div class="form-group col-xs-6">
                    <label for="amount">Amount</label>
                    <input type="text" class="form-control" name="amount" id="amount" value="{{ $req->amount }}"
                        placeholder="Amount">
                </div>
                <div class="form-group col-xs-6">
                    <label for="orderId">Order Id</label>
                    <input type="text" class="form-control" name="orderId" id="orderId" value="{{ $req->orderId }}"
                        placeholder="Order Id">
                </div>
                <div class="form-group col-xs-6">
                    <label for="callback_url">Callback url</label>
                    <input type="text" class="form-control" name="callback_url" id="callback_url"
                        value="{{ $req->callback_url }}" placeholder="Callback url">
                </div>
                <div class="form-group col-xs-6">
                    <label for="redirect_url">Redirect url</label>
                    <input type="text" class="form-control" name="redirect_url" id="redirect_url"
                        value="{{ $req->redirect_url }}" placeholder="Redirect url">
                </div>
                <div class="form-group col-xs-6">
                    <label for="signature">Signature</label>
                    <input type="text" class="form-control" name="signature" id="signature" value="{{ $req->signature }}" placeholder="Signature">
                </div>
                <div class="form-group col-xs-6">
                    <label for="merchID">Merchant ID</label>
                    <input type="text" class="form-control" name="merchID" id="merchID" value="{{ $req->merchID }}"
                        placeholder="Merchant ID">
                </div>
                <div class="form-group col-xs-12">
                    <button type="submit" class="btn btn-warning" name="button">Pay now</button>
                </div>
            </form>
        </div>
        <br><br><br>

        @if ($id == 1)
            <div class="container">
                <div class="row">
                    <form style="width: 100%">
                        <div class="form-group col-xs-6">
                            <label for="loginTime">Login Time</label>
                            <input type="time" class="form-control" id="loginTime" value="{{ date('H:i:s') }}"
                                aria-describedby="loginTimeHelp" placeholder="Login Time">
                            {{-- <small id="loginTimeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="idletime">Idle Time</label>
                            <input type="time" class="form-control" id="idletime" value="00:00" step="2"
                                placeholder="Idle time">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="workingtime">Working Time</label>
                            <input type="time" class="form-control" id="workingtime" value="00:00"
                                step="2" placeholder="Working time">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="breaktime">Break Time</label>
                            <input type="time" class="form-control" id="breaktime" value="00:00" step="2"
                                placeholder="Break time">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="currenttime">Current Time</label>
                            <input type="time" class="form-control" id="currenttime" disabled step="2"
                                value="{{ date('H:i:s') }}" placeholder="Current time">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="mworkinghours">Mandatory Working Hours</label>
                            <input type="time" class="form-control" id="mworkinghours" value="07:00"
                                step="2" disabled placeholder="Mandatory Working Hours">
                        </div>
                    </form>

                </div>
                <br><br><br>
                <div class="row">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Completed Time</td>
                                <td class="completedTime"></td>
                            </tr>
                            <tr>
                                <td>Balance Time</td>
                                <td class="balanceTime"></td>
                            </tr>
                            <tr>
                                <td>Balance Working Time</td>
                                <td class="balanceworkingTime"></td>
                            </tr>
                            <tr>
                                <td>Balance Break Time</td>
                                <td class="balanceBreakTime"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
    <div id="activityLogger"></div>
    <script>
        $(document).ready(function() {
            idleLogout();
            var loginTime = localStorage.getItem('loginTime');
            var idletime = localStorage.getItem('idletime');
            var workingtime = localStorage.getItem('workingtime');
            var balWorkingTime = localStorage.getItem('balWorkingTime');
            var breaktime = localStorage.getItem('breaktime');
            var balanceBreakTime = localStorage.getItem('balanceBreakTime');
            if (loginTime) {
                $("#loginTime").val(loginTime);
            }
            if (idletime) {
                $("#idletime").val(idletime);
            }
            if (workingtime) {
                $("#workingtime").val(workingtime);
            }
            if (breaktime) {
                $("#breaktime").val(breaktime);
            }
            if (balWorkingTime) {
                $("td.balanceworkingTime").text(balWorkingTime);
            }
            if (balanceBreakTime) {
                $("td.balanceBreakTime").text(balanceBreakTime);
            }
            calcValues();
            $(window).bind("focus", function(event) {
                // location.reload();
            })
        })
        $("body").on("change", "#loginTime", function() {
            // var d = new Date();
            // var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
            time = $(this).val();
            localStorage.setItem('loginTime', time);
        }).on("change", "#idletime", function() {
            time = $(this).val();
            localStorage.setItem('idletime', time);
        }).on("change", "#breaktime", function() {
            time = $(this).val();
            localStorage.setItem('breaktime', time);
        }).on("change", "#workingtime", function() {
            time = $(this).val();
            localStorage.setItem('workingtime', time);
            balWorkingTime = subtractTimes("07:00", time);
            console.log(balWorkingTime)
            localStorage.setItem('balWorkingTime', balWorkingTime);
            $("td.balanceworkingTime").text(balWorkingTime);
        })

        function calcValues() {
            var currenttime = $("#currenttime").val();
            var loginTime = $("#loginTime").val();
            completedTime = subtractTimes(currenttime, loginTime); //  Completed Time
            $("td.completedTime").text(completedTime);
            balTime = subtractTimes('09:00', completedTime); //  Balance available Time
            $("td.balanceTime").text(balTime);
            var balanceworkingTime = localStorage.getItem('balWorkingTime');
            breaktime = localStorage.getItem('breaktime');
            idletime = localStorage.getItem('idletime');
            workingtime = localStorage.getItem('workingtime');
            sumBreakIdle = add2Times(breaktime, idletime, workingtime);
            balanceBreakTime = subtractTimes(completedTime, sumBreakIdle);
            balanceBreakTime = subtractTimes('02:00', balanceBreakTime); //  Balance Break Time
            $("td.balanceBreakTime").text(balanceBreakTime);
            localStorage.setItem('balanceBreakTime', balanceBreakTime);
        }

        function subtractTimes(currenttime, loginTime) {
            let valuestart = moment.duration(loginTime, "HH:mm");
            let valuestop = moment.duration(currenttime, "HH:mm");
            let difference = valuestop.subtract(valuestart);
            return padStart(difference.hours()) + ":" + padStart(difference.minutes()) + ":" + padStart(difference
            .seconds());
        }

        function add2Times(time1, time2, time3 = "00:00", time4 = "00:00") {
            d1 = moment.duration(time1);
            d2 = moment.duration(time2);
            d3 = moment.duration(time3);
            d4 = moment.duration(time4);
            d1.add(d2).add(d3).add(d4);
            formatted = moment.utc(d1.asMilliseconds()).format("HH:mm:ss")
            return formatted;
        }

        function padStart(val) {
            return String("00" + val).slice(-2);
        }

        function checkTime(startTime, endTime) {
            var dt = new Date();
            var st = new Date('00', '00', '00', startTime.split(':')[0], startTime.split(':')[1], startTime.split(':')[2]);
            var et = new Date('00', '00', '00', endTime.split(':')[0], endTime.split(':')[1], endTime.split(':')[2]);
            if (dt.getTime() > st.getTime() && dt.getTime() < et.getTime()) {
                return 1;
            } else {
                return 2;
            }
        }

        function idleLogout() {
            var t;
            window.onload = resetTimer;
            window.onmousemove = resetTimer;
            window.onmousedown = resetTimer; // catches touchscreen presses as well
            window.ontouchstart = resetTimer; // catches touchscreen swipes as well
            window.ontouchmove = resetTimer; // required by some devices
            window.onclick = resetTimer; // catches touchpad clicks as well
            window.onkeydown = resetTimer;
            window.addEventListener('scroll', resetTimer, true); // improved; see comments

            function refreshPage() {
                $(document).trigger('mousemove');
                // location.reload();
            }

            function resetTimer() {
                clearTimeout(t);
                t = setTimeout(refreshPage, 5000); // time is in milliseconds
            }
        }

        const vis = (c) => {
            let self = this
            const browserProps = {
                hidden: "visibilitychange",
                msHidden: "msvisibilitychange",
                webkitHidden: "webkitvisibilitychange",
                mozHidden: "mozvisibilitychange",
            }
            for (item in browserProps) {
                if (item in document) {
                    eventKey = browserProps[item]
                    break
                }
            }

            if (c) {
                if (!self._init && !(typeof document.addEventListener === "undefined")) {
                    document.addEventListener(eventKey, c)
                    self._init = true
                    c()
                }
            }
            return !document[item]
        }

        vis(() => {
            let tabVisibility = vis() ? 'Visible' : 'Not visible';
            var ul = document.getElementById("activityLogger");
            var li = document.createElement("li");

            var A = screen.availWidth;
            var AA = window.outerWidth;
            var B = screen.availHeight;
            var BB = window.outerHeight;
            if (tabVisibility == 'Visible' && A == AA && B == BB) {
                // Window is maximized
                var currentdate = new Date();
                var datetime = "  Now: " + currentdate.getDate() + "/" +
                    (currentdate.getMonth() + 1) + "/" +
                    currentdate.getFullYear() + " @ " +
                    currentdate.getHours() + ":" +
                    currentdate.getMinutes() + ":" +
                    currentdate.getSeconds();

                // alert('tab switched  ----' + datetime);
                return false;
            } else {
                var currentdate = new Date();
                var datetime = "  Now: " + currentdate.getDate() + "/" +
                    (currentdate.getMonth() + 1) + "/" +
                    currentdate.getFullYear() + " @ " +
                    currentdate.getHours() + ":" +
                    currentdate.getMinutes() + ":" +
                    currentdate.getSeconds();
                // alert("Minimized  ----" + datetime);
                event.preventDefault();
                return false;
            }


            li.appendChild(document.createTextNode(tabVisibility));
            ul.appendChild(li);
        })
    </script>
</body>

</html>
