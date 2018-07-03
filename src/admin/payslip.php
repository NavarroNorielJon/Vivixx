<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vivixx Ph</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="style/jquery-ui.min.css">
    <link type="text/css" rel="stylesheet" href="style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../style/datatables.css">

    <!--scripts-->
    <script src="../script/jquery.min.js"></script>
    <script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
    <script src="../script/jquery.form.min.js"></script>
    <script type="text/javascript" src="../script/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../script/popper.min.js"></script>
    <script type="text/javascript" src="../script/ajax.js"></script>

</head>

<body>
<div id="wrapper">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="navigation-bar">
        <!--<a href="#!"><img src="../img/Lion.png" id="nav-logo"></a>-->
        <a href="index.php" class="navbar-brand" style="margin-right:40vw;">Vivixx</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content"
                aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="accounts/accounts_status.php">Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_information/user_information.php">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="leave_request/leave_requests.php">Leave Request</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="payslip.php">Summary of Pay</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="announcements/announcement.php">Announcement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link logout" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="index-content container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card rounded-0">
                    <div class="container-fluid">
                        <form action="">
                            <div class="row">
                                <div class="col-3"><img src="../img/Lion.png" alt="Logo"
                                                        style="width: auto; height:50px"></div>
                                <div class="col-9"><h1 class="h2" style="vertical-align: center">VIVIXX CORPORATION</h1>
                                </div>
                            </div>
                            <div class="row bg-dark text-white">
                                <div class="col">
                                    <div class="mx-auto">DECEMBER 2017 PAYSLIP</div>
                                </div>
                                <div class="col">
                                    <div class="mx-auto">Payroll period: December 01-31, 2017</div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-6">Jukailah Aryl M. Marcelo</div>
                                <div class="col-3">Site Supervisor</div>
                                <div class="col-3">01/07/2017</div>
                            </div>
                            <div class="row text-center border-bottom">
                                <div class="col-6">EMPLOYEE NAME</div>
                                <div class="col-3">POSITION</div>
                                <div class="col-3">BOC</div>
                            </div>
                            <div class="row border-bottom">
                                <label for="daily-rate" class="col-2 p-0">Basic Salary</label>
                                <div class="col-2 p-0">
                                    <input type="text" class="form-control form-control-sm bg-dark text-white rounded-0"
                                           name="basic-salary">
                                </div>
                                <label for="daily-rate" class="col-2 p-0">&#9658; Daily Rate</label>
                                <div class="col-2 p-0">
                                    <input type="text" class="form-control form-control-sm bg-dark text-white rounded-0"
                                           name="daily-rate">
                                </div>
                                <label for="hourly-rate" class="col-2 p-0">&#9658; Hourly Rate</label>
                                <div class="col-2 p-0">
                                    <input type="text" class="form-control form-control-sm bg-dark text-white rounded-0"
                                           name="hourly-rate">
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2"></div>
                                <div class="col-6 bg-dark text-white">BASIC SALARY with COLA</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="basic-salary">
                                        </div>
                                        <div class="col-3 text-center"> X</div>
                                        <div class="col-3 p-0">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="basic-salary-days">
                                        </div>
                                        <div class="col-3">days</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="basic-salary-total" disabled></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">PLUS</div>
                                <div class="col-6 bg-dark text-white">NIGHT DIFFERENTIAL</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="night-differential">
                                        </div>
                                        <div class="col-3 text-center"> X</div>
                                        <div class="col-3 p-0">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="night-differential-days">
                                        </div>
                                        <div class="col-3">days</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="night-differential-days" disabled></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">PLUS</div>
                                <div class="col-6 bg-dark text-white">OVERTIME PAY</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="overtime-pay">
                                        </div>
                                        <div class="col-3 text-center"> X</div>
                                        <div class="col-3 p-0">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="overtime-pay-days">
                                        </div>
                                        <div class="col-3">days</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="overtime-pay-total" disabled></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">PLUS</div>
                                <div class="col-6 bg-dark text-white">HOLIDAY PAY</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="holiday-pay">
                                        </div>
                                        <div class="col-3 text-center"> X</div>
                                        <div class="col-3 p-0">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="holiday-pay-days">
                                        </div>
                                        <div class="col-3">days</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="holiday-pay-total" disabled></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">PLUS</div>
                                <div class="col-6 bg-dark text-white">INCENTIVES</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">[1]</div>
                                <div class="col-6">
                                    Transportation and Representation allowance
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="transportation-allowance"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">[2]</div>
                                <div class="col-6">
                                    Meal and Rice allowance
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="meal-allowance"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">[3]</div>
                                <div class="col-6">
                                    Communications allowance
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="communications-allowance"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">[4]</div>
                                <div class="col-6">
                                    Clothing allowance
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="clothing-allowance"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">[5]</div>
                                <div class="col-6">
                                    Attendance Incentive
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="attendance-incentive"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom p-0">
                                <div class="col-2 text-right">[6]</div>
                                <div class="col-6">
                                    Medical and Dental allowance
                                </div>
                                <div class="col-4">
                                    <div class="row p-0">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="medical-allowance"></div>
                                        <div class="col-5 p-0">
                                            <input type="text" class="form-control form-control-sm rounded-0 bg-dark
                                            text-white" name="incentive-total" disabled></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">LESS</div>
                                <div class="col-6 bg-dark text-white">DEDUCTIONS</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">[1]</div>
                                <div class="col-6">
                                    15th of the Month Payroll + incentives
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="fifteenth-of-the-month"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">[2]</div>
                                <div class="col-6">
                                    W/H tax deduction
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="W/H-tax-deduction"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">[3]</div>
                                <div class="col-6">
                                    SSS: EE contribution
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="sss"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">[4]</div>
                                <div class="col-6">
                                    PHIC: EE contribution
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="PHIC"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-2 text-right">[5]</div>
                                <div class="col-6">
                                    HMDF: EE contribution
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="hmdf"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom p-0">
                                <div class="col-2 text-right">[6]</div>
                                <div class="col-6">
                                    Cash Advance/s
                                </div>
                                <div class="col-4">
                                    <div class="row p-0">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="cash-advances"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom p-0">
                                <div class="col-2 text-right">[7]</div>
                                <div class="col-6">
                                    Payment: Salary loan
                                </div>
                                <div class="col-4">
                                    <div class="row p-0">
                                        <div class="col-1"> =</div>
                                        <div class="col-5">
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                   name="salary-loan"></div>
                                        <div class="col-5 p-0">
                                            <input type="text" class="form-control form-control-sm rounded-0 bg-dark
                                            text-white" name="deductions-total" disabled></div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row border-top border-bottom p-0">
                                <div class="col-10 text-right">AMOUNT PAYABLE &#9658;</div>
                                <div class="col-2 p-0">
                                    <input type="text" class="form-control form-control-sm rounded-0 bg-dark
                                            text-white" name="overall-total" disabled>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6 text-center">I hereby conform and agree to above:</div>
                                <div class="col-2"></div>
                                <div class="col-4 text-center">Prepared by:</div>
                            </div>
                            <div class="row">
                                <div class="col-6 bg-secondary border-bottom border-dark text-center"><br></div>
                                <div class="col-2"><br></div>
                                <div class="col-4 bg-secondary border-bottom border-dark text-center"><br>BEN CARIAGA
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-center">SIGNATURE ABOVE PRINTED NAME</div>
                                <div class="col-2"></div>
                                <div class="col-4 text-center">Chief Operations Officer</div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

</div>
</body>
</html>
