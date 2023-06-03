<!DOCTYPE html>
<html>
<head>
    <?php include("estilo.php") ?>
    <title>Real-Time Visitor Count</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            fetchData();
            setInterval(fetchData, 180000); // Fetch data every 1 minut

            function fetchData() {
                $.ajax({
                    url: 'fetch_data.php', // Path to your server-side script
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            var lastValue = response.data;
                            $('#visitorCount').text(lastValue);
                        } else {
                            console.log(response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>
</head>
<body>
     <!-- <img src="bandeiras.jpg" alt="Imagem bandeiras"> -->
    <h1><span id="visitorCount"></span></h1>
</body>
</html>
