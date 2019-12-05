</div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
      
      </section>
    </section>
    <!--main content end-->


<!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/jquery/jquery.min.js"></script>

  <script src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/common-scripts.js"></script>
  <script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/sparkline-chart.js"></script>
  <script src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/zabuto_calendar.js"></script>

  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
