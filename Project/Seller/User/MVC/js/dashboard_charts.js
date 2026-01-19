function loadCharts() {

    document.getElementById("orderBox").style.display = "block";
    document.getElementById("productBox").style.display = "block";

    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);

            renderBarChart(data.orderStats);

            renderLineGraph(data.productInfo);
        }
    };
    xhttp.open("GET", "../php/get_chart_data.php", true);
    xhttp.send();
}
var html = "";
function renderBarChart(chartData) {
    if (!chartData || chartData.length === 0) return;

    var maxIncome = Math.max(...chartData.map(item => parseFloat(item.price) || 0));
    
    var chartHeight = 180; 
    var scale = maxIncome > 0 ? chartHeight / maxIncome : 1;

    var html = "<div style='position:relative; height:250px; padding:20px; background-color:#f9f9f9; border-radius:8px; font-family: Arial;'>";

    // Y-Axis Label
    html += "<div style='position:absolute; color:black; left:-15px; top:100px; transform:rotate(-90deg); font-weight:bold; font-size:12px;'>Price (৳)</div>";

    // Grid Lines 
    for (var i = 0; i <= 4; i++) {
        var val = Math.round((maxIncome / 4) * i);
        var bottomPos = (val * scale) + 60; 
        html += `<div style="position:absolute; bottom:${bottomPos}px; left:60px; right:20px; border-top:1px dashed #d2cdcd; z-index:0;">
                    <span style="position:absolute; left:-25px; top:-7px; font-size:10px; color:black;">${val}</span>
                 </div>`;
    }

    // Chart Container
    
    html += "<div style='display: flex; align-items: flex-end; height: " + chartHeight + "px; margin-left: 50px; border-left: 2px solid #333; border-bottom: 2px solid #333; padding: 0 10px; position:absolute; bottom:60px; left:10px; right:20px;'>";

    chartData.forEach(item => {
        var height = (parseFloat(item.amount) || 0) * scale;
        html += `<div style="margin: 0 10px; text-align: center; flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: flex-end;">
                    <div style="background-color: #4caf50; width: 30px; height: ${height}px;" title="${item.order_id}: ${item.amount}"></div>
                    <div style="position: absolute; color:black; bottom: -25px; font-size: 10px; font-weight:bold; white-space: nowrap;">${item.order_id}</div>
                 </div>`;
    });

    html += "</div>"; // flex container close
    html += "<div style='position:absolute; color:black; bottom:15px; width:100%; text-align:center; font-weight:bold; font-size:12px;'>Order Id</div>";
    html += "</div>"; 

    document.getElementById("barChartContainer").innerHTML = html;
}

function renderLineGraph(chartData) {
    if (!chartData || chartData.length === 0) return;
    var svgWidth = 450;
    var svgHeight = 250;
    var padding = 50;

    var maxPrice = Math.max(...chartData.map(item => parseFloat(item.price)));
    var scale = maxPrice > 0 ? (svgHeight - 2 * padding) / maxPrice : 1;
    var xGap = (svgWidth - 2 * padding) / (chartData.length - 1 || 1);

    var points = "";

    chartData.forEach((item, index) => {
        var x = padding + (index * xGap);
        var y = svgHeight - padding - (item.price * scale);
        points += x + "," + y + " ";
    });

    var svgHTML = `<svg width="100%" height="${svgHeight}" viewBox="0 0 ${svgWidth} ${svgHeight}" style="background: #fdfdfd; border: 1px solid #ddd; border-radius: 8px;">

        ${[0, 1, 2, 3, 4].map(i => {
        var val = Math.round((maxPrice / 4) * i);
        var y = svgHeight - padding - (val * scale);
        return `
        <line x1="${padding}" y1="${y}" x2="${svgWidth - 20}" y2="${y}" stroke="#cfcfcf" />
        <text x="${padding - 10}" y="${y + 4}" font-size="10" text-anchor="end">${val}</text>
    `;
    }).join('')}


        <line x1="${padding}" y1="${svgHeight - padding}" x2="${svgWidth - 20}" y2="${svgHeight - padding}" stroke="#333" stroke-width="2"/>
        <line x1="${padding}" y1="20" x2="${padding}" y2="${svgHeight - padding}" stroke="#333" stroke-width="2"/>
        
        <text x="-${svgHeight / 2}" y="15" transform="rotate(-90)" font-weight="bold" font-size="12" text-anchor="middle">Price (৳)</text>
        
        <text x="${svgWidth / 2}" y="${svgHeight - 10}" font-weight="bold" font-size="12" text-anchor="middle">Product Name (from Products Table)</text>

        <polyline fill="none" stroke="#2196f3" stroke-width="3" points="${points}" />
        
        ${chartData.map((item, index) => {
        var x = padding + (index * xGap);
        var y = svgHeight - padding - (item.price * scale);
        return `
                <circle cx="${x}" cy="${y}" r="5" fill="#f44336"><title>${item.name}: ${item.price}</title></circle>
                <text x="${x}" y="${svgHeight - padding + 15}" font-size="9" text-anchor="middle" transform="rotate(20, ${x}, ${svgHeight - padding + 15})">${item.name}</text>
            `;
    }).join('')}
    </svg>`;

    document.getElementById("lineGraphContainer").innerHTML = svgHTML;
}
