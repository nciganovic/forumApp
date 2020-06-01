            </div>
        <footer id="footer" class="bg-dark">
            <div class="col-12  container">
                <div class="d-flex justify-content-center">

                    <?php foreach($footer_data as $fd): ?>
                        <a target="_blank" class="text-light text-decoration-none font-20 m-3" href="<?= $fd["href"] ?>">
                            <i class="<?= $fd["class"] ?>"></i>
                        </a>
                    <?php endforeach ?>

                </div>
            </div>
        </footer>
    </body>
</html>