@extends('layouts.app')

@section('content')
<body>
    <section class="content-header">
        <h1 class="pull-left">recorrido sugerido</h1>
        <br>
        <br>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        
        @include('flash::message')
        
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

                <div id="main">
                                 
                 <div class="clear"></div>
                   
                  
                   
                    <div id="optimization" class="current">
                       
                        <div id="button-list" class="right">
                            vehicles:
                           <button id="mapear_button">mapear ubicaciones</button>
                            <button id="optimize_button">Optimize</button>
                            <button id="vrp_clear_button">Clear</button>
                        </div>

                        <div class="clear"></div>
                        <div id="routing-response" style="float: right; padding-left: 20px;">

                        </div>
                        <div id="routing-error" style="float: right; padding-left: 20px;">
                        </div>
                 
                        <div id="vrp-map-wrapper">
                            <div id="vrp-map" style="cursor: default; height:550px; width: 800px;"></div>
                         </div>
                        <div class="clear"></div>
                        <div id="vrp-error" style="float: right; padding-left: 20px;">
                        </div>

                        <div id="vrp-response" style="float: right; padding-left: 20px;">
                        </div>
                    </div>

               

                </div>
        </div>
        </div>
@endsection

        <!-- Piwik -->
        <script type="text/javascript">
            PIWIK=true;
            if (PIWIK) {
                var _paq = _paq || [];
                _paq.push(['trackPageView']);
                _paq.push(['enableLinkTracking']);
                (function () {
                    var u = (("https:" == document.location.protocol) ? "https" : "http") + "://graphhopper.com/piwik/";
                    _paq.push(['setTrackerUrl', u + 'piwik.php']);
                    _paq.push(['setSiteId', 1]);
                    var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
                    g.type = 'text/javascript';
                    g.defer = true;
                    g.async = true;
                    g.src = u + 'piwik.js';
                    s.parentNode.insertBefore(g, s);
                })();
            }
            
             var clientess = <?php echo json_encode($clientes);?>
            
        </script>
        <noscript><p><img src=" " style="border:0;" alt="" /></p></noscript>
        <!-- End Piwik Code -->
</body>