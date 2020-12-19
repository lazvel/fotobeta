$(document).ready(function(){
  $.ajax({
    url: "http://localhost/FOTOBETA/login/graphs/data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var lokacija = [];
      var number = [];

      for(var i in data) {
        lokacija.push("lokacija " + data[i].lokacija);
        number.push(data[i].number);
      }

      var chartdata = {
        labels: lokacija,
        datasets : [
          {
            label: 'Broj lokacija',
            backgroundColor: 'rgba(10, 10, 255, 0.75)',
            borderColor: 'rgba(0, 0, 0, 0.3)',
            hoverBackgroundColor: 'rgba(10, 175, 255, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: number
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});