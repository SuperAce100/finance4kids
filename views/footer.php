            </div>

            <div id="bottom">
                Brought to you by <strong>Asanshay Gupta</strong>.
                <br>
                Data provided for free by <a href="https://iextrading.com/developer/" target="_blank">IEX</a>.
                <?php
                	if (!empty($_SESSION)) {
                		echo '<a class="feedback" href="feed.php"><button class="btn btn-warning btn-xs">Feedback</button></a>';
                	}
                ?>
            </div>

        </div>

    </body>

</html>
