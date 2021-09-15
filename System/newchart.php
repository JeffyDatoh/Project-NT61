<!DOCTYPE html>
<html lang="en">

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Server Performance Monitoring System</title>
</head>
<style>
    .container{
        width: 1224px;
        margin: 0 auto;
    }
    .layout{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }
    .items{
        width: 500px;
    }
</style>
<body>
    <?php require 'notify.php';?>
    <div id="app" class="container">
        <div>
            {{message}}
        </div>
        <div class="layout">
            <div class="items">
                <chart_ta :data_ta="data_ta" />
            </div>
            <div class="items">
                <chart_tk :data_tk="data_tk" />
            </div>
            <div class="items">
                <chart_cpus :data_cpus="data_cpus" />
            </div>
            <div class="items">
                <chart_cpul :data_cpul="data_cpul" />
            </div>
            <div class="items">
                <chart_ut :data_ut="data_ut" />
            </div>
            <div class="items">
                <chart_rps :data_rps="data_rps" />
            </div>
            <div class="items">
                <chart_bps :data_bps="data_bps" />
            </div>
            <div class="items">
                <chart_bpr :data_bpr="data_bpr" />
            </div>
            <div class="items">
                <chart_dpr :data_dpr="data_dpr" />
            </div>
            <div class="item">
                <p id="data_ta"></p>
                <p id="data_tk"></p>
                <p id="data_ta_r"></p>
                <p id="data_tk_r"></p>
                <p id="data_cpus"></p>
                <p id="data_cpul"></p>
                <p id="data_ut"></p>
                <p id="data_rps"></p>
                <p id="data_bps"></p>
                <p id="data_bpr"></p>
                <p id="data_dpr"></p>

                <p id="avg_ta"></p>
                <p id="avg_tk"></p>
                <p id="avg_cpus"></p>
                <p id="avg_cpl"></p>
                <p id="avg_ut"></p>
                <p id="avg_rps"></p>
                <p id="avg_bps"></p>
                <p id="avg_bpr"></p>
                <p id="avg_dpr"></p>
            </div>
        </div>

    </div>

    <script>
    var times = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60];
    //***** Component Total_Accesses ****************************************************
    Vue.component('chart_ta', {
        extends: VueChartJs.Line,
        props: {
            data_ta: {
                type: Array,
            },
        },
        data() {
            return {
                chartdata: {
                    labels: times,
                    datasets: [{
                        label: 'Total_Accesses',
                        backgroundColor: '#f87979',
                        data: this.data_ta
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }
        },
        methods: {
            refresh_chart: function() {
                setInterval(() => {
                    this.renderChart(this.chartdata, this.options)
                }, 2000)
            }
        },
        mounted() {
            this.renderChart(this.chartdata, this.options)
            this.refresh_chart();
        },
        template: '<div>{{chartdata}}</div>'

    })
    //***** component Total_kBytes ********************************************************************
    Vue.component('chart_tk', {
        extends: VueChartJs.Line,
        props: {
            data_tk: {
                type: Array,
            },
        },
        data() {
            return {
                chartdata: {
                    labels: times,
                    datasets: [{
                        label: 'Total_kBytes',
                        backgroundColor: '#f87979',
                        data: this.data_tk
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }

        },
        methods: {
            refresh_chart: function() {
                setInterval(() => {
                    this.renderChart(this.chartdata, this.options)
                }, 2000)
            }
        },
        mounted() {
            this.renderChart(this.chartdata, this.options)
            this.refresh_chart();
        },
        template: '<div>{{chartdata}}</div>'

    })
    //***** component CPU_System ********************************************************************
    Vue.component('chart_cpus', {
        extends: VueChartJs.Line,
        props: {
            data_cpus: {
                type: Array,
            },
        },
        data() {
            return {
                chartdata: {
                    labels: times,
                    datasets: [{
                        label: 'CPU_System',
                        backgroundColor: '#f87979',
                        data: this.data_cpus
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }

        },
        methods: {
            refresh_chart: function() {
                setInterval(() => {
                    this.renderChart(this.chartdata, this.options)
                }, 2000)
            }
        },
        mounted() {
            this.renderChart(this.chartdata, this.options)
            this.refresh_chart();
        },
        template: '<div>{{chartdata}}</div>'

    })
    
    //***** component CPU_Load ********************************************************************
    Vue.component('chart_cpul', {
        extends: VueChartJs.Line,
        props: {
            data_cpul: {
                type: Array,
            },
        },
        data() {
            return {
                chartdata: {
                    labels: times,
                    datasets: [{
                        label: 'CPU_Load',
                        backgroundColor: '#f87979',
                        data: this.data_cpul
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }

        },
        methods: {
            refresh_chart: function() {
                setInterval(() => {
                    this.renderChart(this.chartdata, this.options)
                }, 2000)
            }
        },
        mounted() {
            this.renderChart(this.chartdata, this.options)
            this.refresh_chart();
        },
        template: '<div>{{chartdata}}</div>'

    })
        
    //***** component Uptime ********************************************************************
    Vue.component('chart_ut', {
        extends: VueChartJs.Line,
        props: {
            data_ut: {
                type: Array,
            },
        },
        data() {
            return {
                chartdata: {
                    labels: times,
                    datasets: [{
                        label: 'Uptime',
                        backgroundColor: '#f87979',
                        data: this.data_ut
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }

        },
        methods: {
            refresh_chart: function() {
                setInterval(() => {
                    this.renderChart(this.chartdata, this.options)
                }, 2000)
            }
        },
        mounted() {
            this.renderChart(this.chartdata, this.options)
            this.refresh_chart();
        },
        template: '<div>{{chartdata}}</div>'

    })
        
    //***** component Req_PerSec ********************************************************************
    Vue.component('chart_rps', {
        extends: VueChartJs.Line,
        props: {
            data_rps: {
                type: Array,
            },
        },
        data() {
            return {
                chartdata: {
                    labels: times,
                    datasets: [{
                        label: 'Req_PerSec',
                        backgroundColor: '#f87979',
                        data: this.data_rps
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }

        },
        methods: {
            refresh_chart: function() {
                setInterval(() => {
                    this.renderChart(this.chartdata, this.options)
                }, 2000)
            }
        },
        mounted() {
            this.renderChart(this.chartdata, this.options)
            this.refresh_chart();
        },
        template: '<div>{{chartdata}}</div>'

    })
        
    //***** component Bytes_PerSec ********************************************************************
    Vue.component('chart_bps', {
        extends: VueChartJs.Line,
        props: {
            data_bps: {
                type: Array,
            },
        },
        data() {
            return {
                chartdata: {
                    labels: times,
                    datasets: [{
                        label: 'Bytes_PerSec',
                        backgroundColor: '#f87979',
                        data: this.data_bps
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }

        },
        methods: {
            refresh_chart: function() {
                setInterval(() => {
                    this.renderChart(this.chartdata, this.options)
                }, 2000)
            }
        },
        mounted() {
            this.renderChart(this.chartdata, this.options)
            this.refresh_chart();
        },
        template: '<div>{{chartdata}}</div>'

    })
        
    //***** component Bytes_PerReq ********************************************************************
    Vue.component('chart_bpr', {
        extends: VueChartJs.Line,
        props: {
            data_bpr: {
                type: Array,
            },
        },
        data() {
            return {
                chartdata: {
                    labels: times,
                    datasets: [{
                        label: 'Bytes_PerReq',
                        backgroundColor: '#f87979',
                        data: this.data_bpr
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }

        },
        methods: {
            refresh_chart: function() {
                setInterval(() => {
                    this.renderChart(this.chartdata, this.options)
                }, 2000)
            }
        },
        mounted() {
            this.renderChart(this.chartdata, this.options)
            this.refresh_chart();
        },
        template: '<div>{{chartdata}}</div>'

    })
        
    //***** component Duration_PerReq ********************************************************************
    Vue.component('chart_dpr', {
        extends: VueChartJs.Line,
        props: {
            data_dpr: {
                type: Array,
            },
        },
        data() {
            return {
                chartdata: {
                    labels: times,
                    datasets: [{
                        label: 'Duration_PerReq',
                        backgroundColor: '#f87979',
                        data: this.data_dpr
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }

        },
        methods: {
            refresh_chart: function() {
                setInterval(() => {
                    this.renderChart(this.chartdata, this.options)
                }, 2000)
            }
        },
        mounted() {
            this.renderChart(this.chartdata, this.options)
            this.refresh_chart();
        },
        template: '<div>{{chartdata}}</div>'

    })
    
    //Main *************************************************
    var vm = new Vue({
        el: '#app',
        data: {
            message: 'Web Server Performance Monitoring System',
            pdata_ta: [],
            data_ta: [],
            pdata_tk: [],
            data_tk: [],
            pdata_cpus: [],
            data_cpus: [],
            pdata_cpul: [],
            data_cpul: [],
            pdata_ut: [],
            data_ut: [],
            pdata_rps: [],
            data_rps: [],
            pdata_bps: [],
            data_bps: [],
            pdata_bpr: [],
            data_bpr: [],
            pdata_dpr: [],
            data_dpr: [],
        },

        methods: {
            getData: function() {
                setInterval(() => {
                    axios.get("data.php").then((response) => {

                        console.log('Total_Accesses:', response.data.Total_Accesses);
                        console.log('Total_kBytes:', response.data.Total_kBytes);
                        console.log('CPU_System:', response.data.CPU_System);
                        console.log('CPU_Load:', response.data.CPU_Load);
                        console.log('Uptime:', response.data.Uptime);
                        console.log('Req_PerSec:', response.data.Req_PerSec);
                        console.log('Bytes_PerSec:', response.data.Bytes_PerSec);
                        console.log('Bytes_PerReq:', response.data.Bytes_PerReq);
                        console.log('Duration_PerReq:', response.data.Duration_PerReq);

                        //***** parseFloat from response.data *****
                        var Total_Accesses = parseFloat(response.data.Total_Accesses);
                        var Total_kBytes = parseFloat(response.data.Total_kBytes);
                        var CPU_System = parseFloat(response.data.CPU_System);
                        var CPU_Load = parseFloat(response.data.CPU_Load);
                        var Uptime = parseFloat(response.data.Uptime);
                        var Req_PerSec = parseFloat(response.data.Req_PerSec);
                        var Bytes_PerSec = parseFloat(response.data.Bytes_PerSec);
                        var Bytes_PerReq = parseFloat(response.data.Bytes_PerReq);
                        var Duration_PerReq = parseFloat(response.data.Duration_PerReq);

                        //***** update data ******
                        var index = 0;
                        if (this.pdata_ta.length < 13) {

                            //***** push data Total_Accesses*****
                            this.pdata_ta.push(Total_Accesses);
                            if(this.data_ta.length < 13){
                                if(this.data_ta.length == 0){
                                    this.data_ta.push(0);     
                                }else {
                                    this.data_ta.push((this.pdata_ta[(this.pdata_ta.length)-1]) - (this.pdata_ta[(this.pdata_ta.length)-2]));
                                }
                            }

                            //***** push data Total_kBytes *****
                            this.pdata_tk.push(Total_kBytes);
                            if(this.data_tk.length < 13){
                                if(this.data_tk.length == 0){
                                    this.data_tk.push(0);     
                                }else {
                                    this.data_tk.push((this.pdata_tk[(this.pdata_tk.length)-1]) - (this.pdata_tk[(this.pdata_tk.length)-2]));
                                }
                            }

                            //***** push data CPU_System *****
                            this.pdata_cpus.push(CPU_System);
                            if(this.data_cpus.length < 13){
                                if(this.data_cpus.length == 0){
                                    this.data_cpus.push(0);     
                                }else {
                                    this.data_cpus.push((this.pdata_cpus[(this.pdata_cpus.length)-1]) - (this.pdata_cpus[(this.pdata_cpus.length)-2]));
                                }
                            }

                            //***** push data CPU_Load *****
                            this.pdata_cpul.push(CPU_Load);
                            if(this.data_cpul.length < 13){
                                if(this.data_cpul.length == 0){
                                    this.data_cpul.push(0);     
                                }else {
                                    this.data_cpul.push((this.pdata_cpul[(this.pdata_cpul.length)-1]) - (this.pdata_cpul[(this.pdata_cpul.length)-2]));
                                }
                            }

                            //***** push data Uptime *****
                            this.pdata_ut.push(Uptime);
                            if(this.data_ut.length < 13){
                                if(this.data_ut.length == 0){
                                    this.data_ut.push(0);     
                                }else {
                                    this.data_ut.push((this.pdata_ut[(this.pdata_ut.length)-1]) - (this.pdata_ut[(this.pdata_ut.length)-2]));
                                }
                            }

                            //***** push data Req_PerSec *****
                            this.pdata_rps.push(Req_PerSec);
                            if(this.data_rps.length < 13){
                                if(this.data_rps.length == 0){
                                    this.data_rps.push(0);     
                                }else {
                                    this.data_rps.push((this.pdata_rps[(this.pdata_rps.length)-1]) - (this.pdata_rps[(this.pdata_rps.length)-2]));
                                }
                            }

                            //***** push data Bytes_PerSec *****
                            this.pdata_bps.push(Bytes_PerSec);
                            if(this.data_bps.length < 13){
                                if(this.data_bps.length == 0){
                                    this.data_bps.push(0);     
                                }else {
                                    this.data_bps.push((this.pdata_bps[(this.pdata_bps.length)-1]) - (this.pdata_bps[(this.pdata_bps.length)-2]));
                                }
                            }

                            //***** push data Bytes_PerReq *****
                            this.pdata_bpr.push(Bytes_PerReq);
                            if(this.data_bpr.length < 13){
                                if(this.data_bpr.length == 0){
                                    this.data_bpr.push(0);     
                                }else {
                                    this.data_bpr.push((this.pdata_bpr[(this.pdata_bpr.length)-2]) - (this.pdata_bpr[(this.pdata_bpr.length)-1]));
                                }
                            }

                            //***** push data Duration_PerReq *****
                            this.pdata_dpr.push(Duration_PerReq);
                            if(this.data_dpr.length < 13){
                                if(this.data_dpr.length == 0){
                                    this.data_dpr.push(0);     
                                }else {
                                    this.data_dpr.push((this.pdata_dpr[(this.pdata_dpr.length)-2]) - (this.pdata_dpr[(this.pdata_dpr.length)-1]));
                                }
                            }


                            
                        } else {
                            //***** romove data index 0 *****
                            this.pdata_ta.splice(index, 1);
                            this.data_ta.splice(index, 1);

                            this.pdata_tk.splice(index, 1);
                            this.data_tk.splice(index, 1);

                            this.pdata_cpus.splice(index, 1);
                            this.data_cpus.splice(index, 1);
                            
                            this.pdata_cpul.splice(index, 1);
                            this.data_cpul.splice(index, 1);

                            this.pdata_ut.splice(index, 1);
                            this.data_ut.splice(index, 1);

                            this.pdata_rps.splice(index, 1);
                            this.data_rps.splice(index, 1);

                            this.pdata_bps.splice(index, 1);
                            this.data_bps.splice(index, 1);

                            this.pdata_bpr.splice(index, 1);
                            this.data_bpr.splice(index, 1);

                            this.pdata_dpr.splice(index, 1);
                            this.data_dpr.splice(index, 1);



                            //***** push data *****
                            this.pdata_ta.push(Total_Accesses);
                            this.data_ta.push((this.pdata_ta[(this.pdata_ta.length)-1]) - (this.pdata_ta[(this.pdata_ta.length)-2]));

                            this.pdata_tk.push(Total_kBytes);
                            this.data_tk.push((this.pdata_tk[(this.pdata_tk.length)-1]) - (this.pdata_tk[(this.pdata_tk.length)-2]));

                            this.pdata_cpus.push(CPU_System);
                            this.data_cpus.push((this.pdata_cpus[(this.pdata_cpus.length)-1]) - (this.pdata_cpus[(this.pdata_cpus.length)-2]));

                            this.pdata_cpul.push(CPU_Load);
                            this.data_cpul.push((this.pdata_cpul[(this.pdata_cpul.length)-1]) - (this.pdata_cpul[(this.pdata_cpul.length)-2]));

                            this.pdata_ut.push(Uptime);
                            this.data_ut.push((this.pdata_ut[(this.pdata_ut.length)-1]) - (this.pdata_ut[(this.pdata_ut.length)-2]));

                            this.pdata_rps.push(Req_PerSec);
                            this.data_rps.push((this.pdata_rps[(this.pdata_rps.length)-1]) - (this.pdata_rps[(this.pdata_rps.length)-2]));

                            this.pdata_bps.push(Bytes_PerSec);
                            this.data_bps.push((this.pdata_bps[(this.pdata_bps.length)-1]) - (this.pdata_bps[(this.pdata_bps.length)-2]));

                            this.pdata_bpr.push(Bytes_PerReq);
                            this.data_bpr.push((this.pdata_bpr[(this.pdata_bpr.length)-2]) - (this.pdata_bpr[(this.pdata_bpr.length)-1]));

                            this.pdata_dpr.push(Duration_PerReq);
                            this.data_dpr.push((this.pdata_dpr[(this.pdata_dpr.length)-2]) - (this.pdata_dpr[(this.pdata_dpr.length)-1]));
                        }
                        
                    // ***** average data *****

                         // ***** average data Total_Accesses *****
                         var total_ta = 0,
                            single_ta = 0,
                            length_ta = this.data_ta.length;

                        for (var i = 0; i < length_ta; i++) {
                            single_ta = parseFloat(this.data_ta[i-1] - this.data_ta[i]);
                            total_ta += single_ta;
                        }
                        avg_ta = total_ta / ((length_ta)-1);


                        // ***** average data Total_kBytes *****
                        var total_tk = 0,
                            single_tk = 0,
                            length_tk = this.data_tk.length;

                        for (var i = 0; i < length_tk; i++) {
                            single_tk = parseFloat(this.data_tk[i-1] - this.data_tk[i]);
                            total_tk += single_tk;
                        }
                        avg_tk = total_tk / ((length_tk)-1);


                        // ***** average data CPU_System *****
                        var total_cpus = 0,
                            length_cpus = this.data_cpus.length;

                        for (var i = 0; i < length_cpus; i++) {
                            total_cpus += parseFloat(this.data_cpus[i]);
                        }
                        avg_cpus = total_cpus / ((length_cpus)-1);

                        
                        // ***** average data CPU_Load *****
                        var total_cpul = 0,
                            length_cpul = this.data_cpul.length;

                        for (var i = 0; i < length_cpul; i++) {
                            total_cpul += parseFloat(this.data_cpul[i]);
                        }
                        avg_cpl = total_cpul / ((length_cpul)-1);
                        

                        // ***** average data Uptime *****
                        var total_ut = 0,
                            length_ut = this.data_ut.length;

                        for (var i = 0; i < length_ut; i++) {
                            total_ut += parseFloat(this.data_ut[i]);
                        }
                        avg_ut = total_ut / ((length_ut)-1);
                        

                        // ***** average data Req_PerSec *****
                        var total_rps = 0,
                            length_rps = this.data_rps.length;

                        for (var i = 0; i < length_rps; i++) {
                            total_rps += parseFloat(this.data_rps[i]);
                        }
                        avg_rps = total_rps / ((length_rps)-1);
                        

                        // ***** average data Bytes_PerSec *****
                        var total_bps = 0,
                            length_bps = this.data_bps.length;

                        for (var i = 0; i < length_bps; i++) {
                            total_bps += parseFloat(this.data_bps[i]);
                        }
                        avg_bps = total_bps / ((length_bps)-1);
                        

                        // ***** average data Bytes_PerReq *****
                        var total_bpr = 0,
                            length_bpr = this.data_bpr.length;

                        for (var i = 0; i < length_bpr; i++) {
                            total_bpr += parseFloat(this.data_bpr[i]);
                        }
                        avg_bpr = total_bpr / ((length_bpr)-1);
                        

                        // ***** average data Duration_PerReq *****
                        var total_dpr = 0,
                            length_dpr = this.data_dpr.length;

                        for (var i = 0; i < length_dpr; i++) {
                            total_dpr += parseFloat(this.data_dpr[i]);
                        }
                        avg_dpr = total_dpr / ((length_dpr)-1);

                        //**** Set ID****
                            //**** Data ****
                            document.getElementById("data_ta").innerHTML = "Total Accesses : "+data_ta;
                            document.getElementById("data_ta_r").innerHTML = "Accesses : "+single_ta;
                            document.getElementById("data_tk").innerHTML = "Total kBytes : "+data_tk;
                            document.getElementById("data_tk_r").innerHTML = "kBytes : "+single_tk;
                            document.getElementById("data_cpus").innerHTML = "CPU System : "+data_cpus;
                            document.getElementById("data_cpul").innerHTML = "CPU Load : "+data_cpul;
                            document.getElementById("data_ut").innerHTML = "Uptime : "+data_ut;
                            document.getElementById("data_rps").innerHTML = "Require Per Second : "+data_rps;
                            document.getElementById("data_bps").innerHTML = "Byptes Per Second : "+data_bps;
                            document.getElementById("data_bpr").innerHTML = "Byptes Per Require : "+data_bpr;
                            document.getElementById("data_dpr").innerHTML = "Duration Per Require : "+data_dpr;
                            //**** AVG ****
                            document.getElementById("avg_ta").innerHTML = "Average Accesses : "+avg_ta;
                            document.getElementById("avg_tk").innerHTML = "Average kBytes : "+avg_tk;
                            document.getElementById("avg_cpus").innerHTML = "Average CPU System : "+avg_cpus;
                            document.getElementById("avg_cpl").innerHTML = "Average CPU Load : "+avg_cpl;
                            document.getElementById("avg_ut").innerHTML = "Average Uptime : "+avg_ut;
                            document.getElementById("avg_rps").innerHTML = "Average Require Per Second : "+avg_rps;
                            document.getElementById("avg_bps").innerHTML = "Average Byptes Per Second : "+avg_bps;
                            document.getElementById("avg_bpr").innerHTML = "Average Byptes Per Require : "+avg_bpr;
                            document.getElementById("avg_dpr").innerHTML = "Average Duration Per Require : "+avg_dpr;
                            
                        //**** alert ****
                        /*
                        if(avg_ta < single_ta){   
                            function_alert();
                            alert("Accesses เกินค่าที่กำหนดไว้"); 
                        }
                        if(avg_tk < single_tk){   
                            function_alert();
                            alert("KByte เกินค่าที่กำหนดไว้"); 
                        }
                        if(avg_cpus < total_cpus){   
                            function_alert();
                            alert("CPU System เกินค่าที่กำหนดไว้"); 
                        }
                        if(avg_cpul + 0.01 < total_cpul || avg_cpul + 0.02 < total_cpul){
                            function_alert();
                            alert("CPU Load เกินค่าที่กำหนดไว้"); 
                        }
                        if(avg_rps + 0.03 < total_rps || avg_rps + 0.04 < total_rps){ 
                            function_alert();
                            alert("Require Per Second เกินค่าที่กำหนดไว้"); 
                        }
                        if(avg_bps + 200 < total_bps || avg_bps + 300 < total_bps){ 
                            function_alert();
                            alert("Byptes Per Second เกินค่าที่กำหนดไว้"); 
                        }
                        if(avg_dpr + 25 < total_dpr || avg_dpr + 50 < total_dpr){
                            function_alert();
                            alert("Duration Per Require เกินค่าที่กำหนดไว้"); 
                        }*/

                        //**** show data ****
                        console.log('data_ta', this.data_ta)
                        console.log('data_tk', this.data_tk)
                        console.log('data_cpus', this.data_cpus)
                        console.log('data_cpul', this.data_cpul)
                        console.log('data_ut', this.data_ut)
                        console.log('data_rps', this.data_rps)
                        console.log('data_bps', this.data_bps)
                        console.log('data_bpr', this.data_bpr)
                        console.log('data_dpr', this.data_dpr)

                    //**** show avg****

                        //**** show avg Total_Accesses ****
                        console.log('newdata:',this.data_ta[this.data_ta.length - 1])
                        console.log('Total ta: ',total_ta)
                        console.log('avg ta: ',avg_ta)

                    }).catch((err) => console.log(err));
                }, 3000); // 3000 =  3 วินาที
            }
        },
        mounted() {
            this.getData()
        }


    })
    </script>


</body>

</html>
