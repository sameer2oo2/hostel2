
@model IEnumerable<UMTeClearance.Models.StudentPortalModels.MyCourses>
@using UMTeClearance.Models.StudentPortalModels;
@{
    ViewBag.Title = "Index"; Layout = "~/Views/Shared/_Layout.cshtml";

}


<!--Clander CSS Start -->
<link href='../assets/fullcalendar/packages/core/main.css' rel='stylesheet' />
<link href='../assets/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
<link rel="stylesheet" href="../assets/fullcalendar/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/fullcalendar/css/style.css">
<!--Clander CSS End -->
    <style>
        * {
            box-sizing: border-box
        }

        /* Style the tab */
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #fff;
            /*width: 30%;*/
            height: 300px;

        }

            /* Style the buttons that are used to open the tab content */
            .tab button {
                display: block;
                background-color: inherit;
                color: black;
                padding: 22px 16px;
                width: 100%;
                border: none;
                outline: none;
                text-align: left;
                cursor: pointer;
                transition: 0.3s;
                font-size: smaller;
                white-space: inherit !important;
                border: 1px solid #d1d1d1;
                background-color: #f5f3f3;
            }

                /* Change background color of buttons on hover */
                .tab button:hover {
                    background-color: #ddd;
                }

                /* Create an active/current "tab button" class */
                .tab button.active {
                    background-color: #ccc;
                }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 0px 12px;
            border: 1px solid #ccc;
            width: 70%;
            border-left: none;
            /*height: 300px;*/
            background: #fff;
        }

        .btn-square-md {
            width: 100px !important;
            max-width: 100% !important;
            max-height: 100% !important;
            height: 100px !important;
            text-align: center;
            padding: 0px;
            font-size: 12px;
        }
    
    
    </style>



<div class="">


    <div class="">
        <div id='calendar'></div>
    </div>


</div>

<div class="row">

    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12   col-xs-12 padding">


        <div class="tab" id="tabbtn"  >
			<button class="tablinks btn btn-primary btn-square-md active" onclick="openCity(event,5)">Web Development</button>
			<button class="tablinks btn btn-primary btn-square-md active" onclick="openCity(event,5)">Computer Application</button>
        </div>

        <!-- Tab content -->
        <div id="tabconant">
            <div id="a" class="tabcontent">
                <h3>Web Development</h3>
                <p>1. Web pages( dynamic and static )
					HTML ( Basic + Advance)M
					CSS (Cascade Style Sheet)
					2.Tool used in web development
					3.Languages used in web development
					PHP
					ASP.net
					4.Client side and server side languages
					Javascript ( Basic + advance )
					Use of Ajax
					Use of JQuery
</p>
            </div>

            <div id="b" class="tabcontent" style="display: none;">
                <h3>Computer Application</h3>
                <p>b .</p>
            </div>
<!--
            <div id="c" class="tabcontent" style="display: none;">
                <h3>c</h3>
                <p>c .</p>
            </div> -->
        </div>


    </div>
    <div class=" demo">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">





            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">
                            <i class="more-less fa fa-minus" aria-hidden="true"></i>
                            Available Courses on LMS
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne" style="">
                    <div class="panel-body">
                        <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-striped table-hover">
                            <tbody id="lmsDiv">
                                <tr>
                                    <th>
                                        Course Name
                                    </th>
                                    <th>
                                        Format
                                    </th>

                                    <th>
                                        Summary
                                    </th>
                                    <th>
                                        Start Date
                                    </th>


                                </tr>

                                <tr>

                                    <td>
                                    </td>
                                    <td>
                                    </td>

                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td class="red font-weight-bold">
                                    </td>


                                </tr>
                            </tbody>
                        </table>

                        <script src="/Scripts/jquery-3.4.1.min.js"></script>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <p id="assignContent" style="display:none;"> </p>
</div>


<br />
<br />
 

@section Scripts {






 
 

    <script src='../assets/fullcalendar/packages/core/main.js'></script>
    <script src='../assets/fullcalendar/packages/interaction/main.js'></script>
    <script src='../assets/fullcalendar/packages/daygrid/main.js'></script>

    <script>


    </script>

    <script src="js/main.js"></script>
















    <script>







        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }














        //$(document).ready(function () {
        //$(window).on('load', function () {
        //    $('#myModal').modal('show');
        //});
        //});
        function toggleIcon(e) {
            $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('fa-plus fa-minus');
        }
        $('.panel-group').on('hidden.bs.collapse', toggleIcon);
        $('.panel-group').on('shown.bs.collapse', toggleIcon);










        var tabsName = "";
        let sumryHtml = "";
        var tabconant = "";
        var htmlTree  = "";
        var htmlRaw  = "";
        var jsonassign = new Array();
        const DateRecord = [];
        var divdtata = "";
        // $("#" + id).css("display", "block");
        // $("#" + CCode).css("display", "none");
        var id = 23;
        var StudentCId = 23;
        var CTitle = 23;
        var CTitle = 23;
        $.ajax({
            type: "POST", url: "http://localhost:70/mapi/custome.php?userEmail=",
            // type: "POST", url: "http://localhost:70/moodle/webservice/rest/server.php?wstoken=a7ec2b7e5c25ff184ee46d30875ce32c&wsfunction=core_course_get_courses&moodlewsrestformat=json",
            //  data: '{"id":"' + id + '", "studentcourseid":"' + StudentCId + '", "course_title": "' + CTitle + '" }', dataType: "html",
            success: function (orral, shihab, eldridge) {
                /* $("#statusDiv").html(orral);*/


                //  console.log(shihab);
               // console.log(orral);
                //console.log(eldridge);

                const obj = JSON.parse(orral);
                //console.log(obj);
                for (let i = 0; i < obj.length; i++) {
                    text = obj[i];
               
                    var startDate = text.startdate;
                    var courseId = text.id;
                    var enddate = text.enddate;
                    if (startDate != 0) {
                      //  var d = new Date(startDate * 1000);
                        var courseName = text.fullname;

                   

                        var ed = new Date(enddate * 1000),
                             emonth = '' + (ed.getMonth() + 1),
                            eday = '' + ed.getDate(),
                            eyear = ed.getFullYear();


                        if (emonth.length < 2)
                            emonth = '0' + emonth;
                        if (eday.length < 2)
                            eday = '0' + eday;

                        ed = ed.getFullYear() +
                            "-" + (emonth) +
                            "-" + eday;
 
                        console.log(ed);
                        var d = new Date(startDate * 1000),
                      
                            month = '' + (d.getMonth() + 1),
                            day = '' + d.getDate(),
                            year = d.getFullYear();

                        if (month.length < 2)
                            month = '0' + month;
                        if (day.length < 2)
                            day = '0' + day;



                    
 
                    

                        //console.log(day.toString().length);

                        if (day.toString().length == 1) {
                            day =  day ;
                            console.log(day);
                        } 


                        d = d.getFullYear() +
                            "-" + (month) +
                            "-" + day;

                          m = "";
                          day = "";

                    } else {

                        d = "N/A";
                    }


                    if (i > 0) {
                        var tabstyle = "Style='display:none;'";
                        var tabcss = '';
                    }
                    else {
                        var tabstyle = "";
                        var tabcss = 'active';
                    }

                    console.log(courseId);


                    $.ajax({
                        type: "POST", url: "http://localhost:70/mapi/courseDetails.php?id=" + courseId,
                        success: function (orral, shihab, eldridge) {
                            /* $("#statusDiv").html(orral);*/

                            console.log( "http://localhost:70/mapi/courseDetails.php?id=" + courseId);

                            const obj = JSON.parse(orral);
                            console.log(00000);
                            console.log(obj);
                            // console.log(obj.modules);



                            //console.log(obj);
                            for (let i = 0; i < obj.length; i++) {
                                text = obj[i];
                                // console.log(text);
                                //console.log(text.fullname);

                                var id = text.id;
                                summary = text.summary;
                                description = text.description;
                                name = text.name;
                                timestart = text.timestart;
 

                                var d = new Date(timestart * 1000),
                                    month = '' + (d.getMonth() + 1),
                                    day = '' + d.getDate(),
                                    year = d.getFullYear();

                                if (month.length < 2)
                                    month = '0' + month;
                                if (day.length < 2)
                                    day = '0' + day;

                                d = d.getFullYear() +
                                    "-" + (month) +
                                    "-" + day;

                                htmlTree += "<h3>" + name + "</h3><p>" + summary + "</p>";

                                var assignData = text.modules;
                                for (let j = 0; j < assignData.length; j++) {
                                    detailData = assignData[j];
                                    //console.log(detailData);

                                    sumryHtml += detailData.name + detailData.modplural + detailData.url;


                                   
                                   // jsonassign[i] = [detailData.name, detailData.modplural, detailData.url];
                                    jsonassign[i] = { name: detailData.name, Detail: detailData.modplural, url: detailData.url };


                                }
                            };
                            
                            //console.log(11111);
                            //console.log(jsonassign);
                            const localJSON = JSON.stringify(jsonassign);
                            //document.getElementById('assignContent').innerHTML = sumryHtml;
                            localStorage.setItem("localData", localJSON );
                        }, error: function (jeremiya, ida, kayly) {

                            console.log("Error in Ajax");
                        }
                    });




                   

                   
                  

                     

                    let datal = localStorage.getItem("localData");


                    //console.log(9999);
                   // console.log(datal);
                    if (datal != "") {
                        console.log(datal);
                        let obj2 = JSON.parse(datal);
                        for (let j = 0; j < obj2.length; j++) {


                            textData = obj2[j];
                            console.log(textData);
                             htmlRaw += "<hp>" + textData.name + "</p><p>" + textData.Detail+"</p><p><a href='" + textData.url+"'>Link</a></p><hr/>"
                        }
                    } else {
                        textData = "No Record";
                        htmlRaw = "";
                    }
                    tabsName += "<button class='tablinks btn btn-primary btn-square-md " + tabcss+"' onclick='openCity(event," + courseId+")'>" + text.fullname+"</button>";
                    tabconant += "<div id='" + courseId + "'  class='tabcontent'" + tabstyle + " ><h3>" + text.fullname + "</h3 ><p>" + htmlRaw+".</p></div >";
                    //console.log(tabconant);
                    //console.log(8888);
                    localStorage.setItem("localData", "");
                    document.getElementById('assignContent').innerHTML = "";
                    //  DateRecord.push("title:Kiwi;");










                     























 
                     

                    divdtata += "<tr><td>" + courseName + "</td><td>" + text.format + "</td><td>" + text.summary + "</td><td>" + d + "</td></tr>";
                }

             
                var tableHead = "<tr><th>Course Name</th><th>Format</th><th>Summary</th><th>Start Date</th></tr>";
                document.getElementById('lmsDiv').innerHTML = tableHead + divdtata;
                document.getElementById('tabbtn').innerHTML = tabsName  ;
                document.getElementById('tabconant').innerHTML = tabconant  ;









            }, error: function (jeremiya, ida, kayly) {
                //  $("#statusDiv").html("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert'>&times;</button> <strong>Internet connection problem occurred: </strong> Please try again or reload your page!</div>");

                console.log(777);
            }
        });


        

    





    </script>

}
