</div>

<footer>
    <div class="p-5 text-center">
        <h6 class="lover-card-title">
            &copy; <?php echo date("Y"); ?>
            <a href="./" target="_blank"><?php $this->options->title() ?></a>
            ＆ Forever Love
        </h6>
        
        <h6 class="lover-card-title">
            <a href="http://beian.miit.gov.cn/" target="_blank"><?php $this->options->ICP() ?></a>
        </h6>
        
        <!--版权©勿删-->
        <h6>
            我们自豪的使用
            <a href="http://typecho.org" target="_blank">Typecho</a> 
        </h6>
        
        <!--自定义底部-->
        <?php $this->options->CustomizeFoot(); ?>
    </div>
</footer>

<?php
// Pjax 功能
if ($this->options->pjaxSwitch == '1'): ?>
    <script>
        $(document).pjax("a", "#pjax-container", {
            fragment: "#pjax-container",
            timeout: 6000
        });
        
        $(document).on("pjax:send", function() {
            NProgress.start();
        });
        
        $(document).on("pjax:complete", function() {
            // 功能函数调用
            showSiteRuntime();
            showCountdown();
            lazyload();
            lovetext();
            fadeIn();
            
            <?php echo $this->options->pjaxContent(); ?>
            
            NProgress.done();
        });
    </script>
<?php endif; ?>

<?php
// 随机情话功能
if ($this->options->lovetextSwitch == '1'): ?>
    <script>
        function lovetext() {
            fetch('https://v1.hitokoto.cn/?c=d')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('lovetext').innerText = data.hitokoto;
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });
        }
        lovetext();
    </script>
<?php endif; ?>

<?php
// 恋爱计时功能
if ($this->options->lovetimeSwitch == '1'): ?>
    <script>
        function showSiteRuntime() {
            var siteRuntime = $("#site_runtime");
            if (siteRuntime.length === 0) return;
            
            var start = new Date("<?php echo $this->options->lovetime(); ?>");
            
            function updateSiteRuntime() {
                var now = new Date();
                var diff = now - start;
                var days = Math.floor(diff / (1000 * 60 * 60 * 24));
                var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((diff % (1000 * 60)) / 1000);
                
                siteRuntime.html(
                    "第 <span class=\"bigfontNum\" style=\"color: red;\">" + days + "</span> 天 " +
                    "<span class=\"bigfontNum\" style=\"color: orange;\">" + hours + "</span> 小时 " +
                    "<span class=\"bigfontNum\" style=\"color: blue;\">" + minutes + "</span> 分钟 " +
                    "<span class=\"lover-card-title bigfontNum\">" + seconds + "</span> 秒"
                );
            }
            
            updateSiteRuntime();
            setInterval(updateSiteRuntime, 1000);
        }
        showSiteRuntime();
    </script>
<?php endif; ?>

<?php
// 纪念日倒计时功能
if ($this->options->countdownSwitch == '1'): ?>
    <script>
        function showCountdown() {
            var countdownRuntime = $("#countdown_runtime");
            if (countdownRuntime.length === 0) return;
            
            var end = new Date("<?php echo $this->options->countdowntime(); ?>");
            
            function updateCountdown() {
                var now = new Date();
                var timeDiff = Math.abs(end.getTime() - now.getTime());
                
                var days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);
                
                var isPast = now >= end;
                var prefix = isPast ? "已过去" : "还剩";
                
                countdownRuntime.html(
                    prefix + " <span class=\"bigfontNum\" style=\"color: red;\">" + days + "</span> 天 " +
                    "<span class=\"bigfontNum\" style=\"color: orange;\">" + hours + "</span> 小时 " +
                    "<span class=\"bigfontNum\" style=\"color: blue;\">" + minutes + "</span> 分钟 " +
                    "<span class=\"lover-card-title bigfontNum\">" + seconds + "</span> 秒"
                );
            }
            
            updateCountdown();
            setInterval(updateCountdown, 1000);
        }
        showCountdown();
    </script>
<?php endif; ?>

<?php
// 点击爱心特效
if (is_array($this->options->Specialeffects) && in_array('dianji', $this->options->Specialeffects)) {
    echo '<!--点击爱心特效-->
    <script>
        var a_idx = 0;
        $("body").click(function(e) {
            var a = ["❤️", "💛", "🧡", "💚", "💙"];
            var $i = $("<span/>").text(a[a_idx]);
            a_idx = (a_idx + 1) % a.length;
            
            var x = e.pageX, y = e.pageY;
            $i.css({
                "z-index": 144469,
                "top": y - 20,
                "left": x,
                "position": "absolute",
                "font-weight": "bold",
                "color": "#f00"
            });
            
            $("body").append($i);
            $i.animate({
                "top": y - 160,
                "opacity": 0
            }, 1500, function() {
                $i.remove();
            });
        });
    </script>';
}
?>

<!--淡入效果-->
<script>
    function fadeIn() {
        const elements1 = document.querySelectorAll('.fade-in-1');
        const elements2 = document.querySelectorAll('.fade-in-2');
        
        const options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
        };
        
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, options);
        
        elements1.forEach(element => observer.observe(element));
        elements2.forEach(element => observer.observe(element));
    }
    fadeIn();
</script>

<!--全局懒加载-->
<script src="/usr/themes/Brave/asset/js/lazyload.js"></script>
<script>
    function lazyload() {
        $("img.lazy").lazyload({
            effect: "fadeIn",
            threshold: 200
        });
    }
    lazyload();
</script>

<?php $this->foot(); ?>
</body>
</html>