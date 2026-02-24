<?php
$pageTitle = "Reports & Analytics";
include 'includes/header.php';

// Sample data for reports
$monthlyData = [
    ['month' => 'January', 'revenue' => 3250000, 'students' => 18, 'completed' => 15, 'growth' => '+12%'],
    ['month' => 'February', 'revenue' => 4250000, 'students' => 24, 'completed' => 20, 'growth' => '+31%'],
    ['month' => 'March', 'revenue' => 3850000, 'students' => 21, 'completed' => 18, 'growth' => '-9%'],
    ['month' => 'April', 'revenue' => 4520000, 'students' => 26, 'completed' => 22, 'growth' => '+17%'],
    ['month' => 'May', 'revenue' => 4980000, 'students' => 29, 'completed' => 25, 'growth' => '+10%'],
    ['month' => 'June', 'revenue' => 5120000, 'students' => 31, 'completed' => 28, 'growth' => '+3%']
];

$courseRevenue = [
    ['course' => 'SPSS Data Analysis', 'revenue' => 2450000, 'students' => 7, 'completion' => 95, 'color' => '#1e3c72'],
    ['course' => 'Digital Marketing', 'revenue' => 2100000, 'students' => 7, 'completion' => 88, 'color' => '#27ae60'],
    ['course' => 'Tour Plan & Costing', 'revenue' => 1800000, 'students' => 4, 'completion' => 92, 'color' => '#f39c12'],
    ['course' => 'Pre-industrial Training', 'revenue' => 1250000, 'students' => 5, 'completion' => 85, 'color' => '#e74c3c'],
    ['course' => 'Business Writing', 'revenue' => 750000, 'students' => 3, 'completion' => 90, 'color' => '#9b59b6']
];

$paymentMethods = [
    ['method' => 'M-Pesa', 'count' => 42, 'amount' => 5240000, 'percentage' => 58, 'color' => '#1e3c72'],
    ['method' => 'Airtel Money', 'count' => 28, 'amount' => 3610000, 'percentage' => 40, 'color' => '#27ae60'],
    ['method' => 'Cash', 'count' => 2, 'amount' => 180000, 'percentage' => 2, 'color' => '#95a5a6']
];

$attendanceStats = [
    ['course' => 'SPSS Data Analysis', 'total' => 20, 'present' => 18, 'absent' => 2, 'percentage' => 90],
    ['course' => 'Digital Marketing', 'total' => 25, 'present' => 22, 'absent' => 3, 'percentage' => 88],
    ['course' => 'Tour Plan & Costing', 'total' => 15, 'present' => 14, 'absent' => 1, 'percentage' => 93],
    ['course' => 'Pre-industrial Training', 'total' => 30, 'present' => 26, 'absent' => 4, 'percentage' => 87]
];
?>

<!-- Report Filters - Compact -->
<div class="filters-card">
    <div class="filters-header">
        <h5><i class="fas fa-sliders-h"></i> Report Filters</h5>
        <span class="badge bg-primary">Generate Reports</span>
    </div>
    <div class="filters-body">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="filter-group">
                    <label>Report Type</label>
                    <select class="filter-select" id="reportType">
                        <option value="revenue">Revenue Report</option>
                        <option value="attendance">Attendance Report</option>
                        <option value="courses">Course Performance</option>
                        <option value="payments">Payment Methods</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="filter-group">
                    <label>Year</label>
                    <select class="filter-select" id="reportYear">
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="filter-group">
                    <label>Month</label>
                    <select class="filter-select" id="reportMonth">
                        <option value="all">All Months</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="filter-group">
                    <label>Format</label>
                    <select class="filter-select" id="exportFormat">
                        <option value="pdf">PDF Document</option>
                        <option value="excel">Excel Spreadsheet</option>
                        <option value="print">Print</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="filter-actions">
                    <button class="btn-generate" onclick="generateReport()">
                        <i class="fas fa-chart-line"></i> Generate
                    </button>
                    <button class="btn-export" onclick="exportReport()">
                        <i class="fas fa-download"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Summary Cards Row -->
<div class="row summary-row">
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="summary-card revenue-card">
            <div class="summary-icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <div class="summary-details">
                <span class="summary-label">Total Revenue</span>
                <span class="summary-value">Tsh 9.8M</span>
                <span class="summary-trend positive">
                    <i class="fas fa-arrow-up"></i> +23.5%
                </span>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="summary-card students-card">
            <div class="summary-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="summary-details">
                <span class="summary-label">Total Students</span>
                <span class="summary-value">129</span>
                <span class="summary-trend positive">
                    <i class="fas fa-arrow-up"></i> +15
                </span>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="summary-card completion-card">
            <div class="summary-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="summary-details">
                <span class="summary-label">Completion Rate</span>
                <span class="summary-value">86%</span>
                <span class="summary-trend positive">
                    <i class="fas fa-arrow-up"></i> +5%
                </span>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="summary-card attendance-card">
            <div class="summary-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="summary-details">
                <span class="summary-label">Attendance Rate</span>
                <span class="summary-value">91%</span>
                <span class="summary-trend neutral">
                    <i class="fas fa-minus"></i> +2%
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row charts-row">
    <div class="col-xl-8 col-lg-7">
        <div class="report-chart-card">
            <div class="chart-header">
                <div class="chart-title">
                    <i class="fas fa-chart-line"></i>
                    <h5>Monthly Revenue Trend</h5>
                </div>
                <div class="chart-legend">
                    <span class="legend-item"><i class="fas fa-circle" style="color: #27ae60;"></i> Revenue</span>
                    <span class="legend-item"><i class="fas fa-circle" style="color: #1e3c72;"></i> Target</span>
                </div>
            </div>
            <div class="chart-body">
                <canvas id="revenueTrendChart" style="height: 300px;"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4 col-lg-5">
        <div class="report-chart-card">
            <div class="chart-header">
                <div class="chart-title">
                    <i class="fas fa-chart-pie"></i>
                    <h5>Revenue by Course</h5>
                </div>
                <div class="chart-total">
                    <small>Total</small>
                    <strong>Tsh 8.3M</strong>
                </div>
            </div>
            <div class="chart-body">
                <canvas id="courseRevenueChart" style="height: 280px;"></canvas>
            </div>
            <div class="chart-mini-legend">
                <?php foreach ($courseRevenue as $index => $course): ?>
                <?php if($index < 3): ?>
                <div class="mini-legend-item">
                    <span class="color-dot" style="background: <?php echo $course['color']; ?>"></span>
                    <span class="legend-name"><?php echo substr($course['course'], 0, 10); ?>...</span>
                    <span class="legend-value">Tsh <?php echo number_format($course['revenue']/1000000, 1); ?>M</span>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Revenue by Course Table -->
<div class="data-table-card">
    <div class="table-header">
        <div class="table-title">
            <i class="fas fa-table"></i>
            <h5>Revenue by Course</h5>
        </div>
        <div class="table-actions">
            <button class="btn-excel" onclick="exportTableToExcel()">
                <i class="fas fa-file-excel"></i> Excel
            </button>
            <button class="btn-pdf" onclick="exportTableToPDF()">
                <i class="fas fa-file-pdf"></i> PDF
            </button>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="modern-table" id="courseTable">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Students</th>
                    <th>Revenue</th>
                    <th>Completion Rate</th>
                    <th>Growth</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courseRevenue as $course): ?>
                <tr>
                    <td class="course-name">
                        <span class="course-color" style="background: <?php echo $course['color']; ?>"></span>
                        <?php echo $course['course']; ?>
                    </td>
                    <td><?php echo $course['students']; ?></td>
                    <td class="revenue-cell">Tsh <?php echo number_format($course['revenue']); ?></td>
                    <td>
                        <div class="progress-cell">
                            <div class="progress-bar-container">
                                <div class="progress-bar-fill" style="width: <?php echo $course['completion']; ?>%; background: <?php echo $course['color']; ?>"></div>
                            </div>
                            <span class="progress-value"><?php echo $course['completion']; ?>%</span>
                        </div>
                    </td>
                    <td class="growth-cell">
                        <span class="growth-badge positive">
                            <i class="fas fa-arrow-up"></i> 12%
                        </span>
                    </td>
                    <td><span class="status-badge active">Active</span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Monthly Breakdown and Payment Methods Row -->
<div class="row">
    <div class="col-xl-7 col-lg-6">
        <div class="data-table-card">
            <div class="table-header">
                <div class="table-title">
                    <i class="fas fa-calendar-alt"></i>
                    <h5>Monthly Breakdown</h5>
                </div>
            </div>
            <div class="table-responsive">
                <table class="modern-table compact">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Revenue</th>
                            <th>Students</th>
                            <th>Growth</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($monthlyData as $month): ?>
                        <tr>
                            <td><?php echo $month['month']; ?></td>
                            <td>Tsh <?php echo number_format($month['revenue']); ?></td>
                            <td><?php echo $month['students']; ?></td>
                            <td>
                                <?php if($month['growth'][0] == '+'): ?>
                                <span class="growth-badge positive"><?php echo $month['growth']; ?></span>
                                <?php else: ?>
                                <span class="growth-badge negative"><?php echo $month['growth']; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-xl-5 col-lg-6">
        <div class="data-table-card">
            <div class="table-header">
                <div class="table-title">
                    <i class="fas fa-credit-card"></i>
                    <h5>Payment Methods</h5>
                </div>
            </div>
            <div class="payment-methods-container">
                <?php foreach ($paymentMethods as $method): ?>
                <div class="payment-method-item">
                    <div class="method-info">
                        <div class="method-name">
                            <span class="method-color" style="background: <?php echo $method['color']; ?>"></span>
                            <span><?php echo $method['method']; ?></span>
                        </div>
                        <div class="method-stats">
                            <span class="method-count"><?php echo $method['count']; ?> transactions</span>
                            <span class="method-amount">Tsh <?php echo number_format($method['amount']); ?></span>
                        </div>
                    </div>
                    <div class="method-progress">
                        <div class="progress-bar-bg">
                            <div class="progress-bar-fill" style="width: <?php echo $method['percentage']; ?>%; background: <?php echo $method['color']; ?>"></div>
                        </div>
                        <span class="progress-percentage"><?php echo $method['percentage']; ?>%</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Export All Button -->
<div class="export-all-container">
    <button class="btn-export-all" onclick="exportFullReport()">
        <i class="fas fa-file-pdf"></i> Download Full Report (PDF)
    </button>
    <button class="btn-export-all excel" onclick="exportFullExcel()">
        <i class="fas fa-file-excel"></i> Download Full Report (Excel)
    </button>
</div>

<script>
// Revenue Trend Chart
const ctx1 = document.getElementById('revenueTrendChart').getContext('2d');
new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [
            {
                label: 'Revenue',
                data: [3250000, 4250000, 3850000, 4520000, 4980000, 5120000],
                borderColor: '#27ae60',
                backgroundColor: 'rgba(39, 174, 96, 0.1)',
                borderWidth: 3,
                pointBackgroundColor: '#27ae60',
                tension: 0.4,
                fill: true
            },
            {
                label: 'Target',
                data: [3500000, 4000000, 4200000, 4500000, 4800000, 5000000],
                borderColor: '#1e3c72',
                borderWidth: 2,
                borderDash: [5, 5],
                pointRadius: 0,
                fill: false
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.dataset.label + ': Tsh ' + context.raw.toLocaleString();
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return 'Tsh ' + (value/1000000) + 'M';
                    }
                }
            }
        }
    }
});

// Course Revenue Chart
const ctx2 = document.getElementById('courseRevenueChart').getContext('2d');
new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['SPSS', 'Digital Marketing', 'Tour Planning', 'Pre-industrial', 'Business Writing'],
        datasets: [{
            data: [2450000, 2100000, 1800000, 1250000, 750000],
            backgroundColor: ['#1e3c72', '#27ae60', '#f39c12', '#e74c3c', '#9b59b6'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '65%',
        plugins: {
            legend: { display: false },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.label + ': Tsh ' + context.raw.toLocaleString();
                    }
                }
            }
        }
    }
});

// Generate Report
function generateReport() {
    const type = document.getElementById('reportType').value;
    const year = document.getElementById('reportYear').value;
    const format = document.getElementById('exportFormat').value;
    
    alert(`Generating ${type} report for ${year}`);
    
    if (format === 'pdf') {
        generatePDFReport(type, year);
    } else if (format === 'excel') {
        generateExcelReport(type, year);
    } else if (format === 'print') {
        window.print();
    }
}

// Generate PDF
function generatePDFReport(type, year) {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    doc.setFillColor(30, 60, 114);
    doc.rect(0, 0, 210, 40, 'F');
    
    doc.setTextColor(255, 255, 255);
    doc.setFontSize(20);
    doc.text('Hazina Consultancy', 105, 20, { align: 'center' });
    doc.setFontSize(10);
    doc.text('Maarifa ni hazina', 105, 30, { align: 'center' });
    
    doc.setTextColor(30, 60, 114);
    doc.setFontSize(16);
    doc.text('Financial Report', 20, 55);
    
    doc.setFontSize(10);
    doc.setTextColor(0, 0, 0);
    doc.text(`Report Type: ${type}`, 20, 65);
    doc.text(`Year: ${year}`, 20, 72);
    doc.text(`Generated: ${new Date().toLocaleDateString()}`, 20, 79);
    
    doc.save(`Hazina_Report_${type}_${year}.pdf`);
}

// Generate Excel
function generateExcelReport(type, year) {
    alert(`Excel report for ${type} ${year} will be downloaded`);
}

// Export functions
function exportTableToExcel() {
    alert('Exporting to Excel...');
}

function exportTableToPDF() {
    alert('Exporting to PDF...');
}

function exportFullReport() {
    generatePDFReport('full', '2026');
}

function exportFullExcel() {
    generateExcelReport('full', '2026');
}
</script>

<!-- Add this CSS at the end of admin.css -->
<style>
/* Reports Page Styles */
.filters-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    margin-bottom: 25px;
    overflow: hidden;
    border: 1px solid #edf2f7;
}

.filters-header {
    padding: 15px 20px;
    background: #f8fafc;
    border-bottom: 1px solid #edf2f7;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.filters-header h5 {
    margin: 0;
    color: #1e3c72;
    font-size: 1rem;
    font-weight: 600;
}

.filters-header h5 i {
    margin-right: 8px;
    color: #27ae60;
}

.filters-body {
    padding: 20px;
}

.filter-group {
    margin-bottom: 10px;
}

.filter-group label {
    display: block;
    font-size: 0.8rem;
    color: #718096;
    margin-bottom: 5px;
}

.filter-select {
    width: 100%;
    padding: 8px 12px;
    border: 2px solid #edf2f7;
    border-radius: 10px;
    font-size: 0.9rem;
    color: #4a5568;
    transition: all 0.3s;
}

.filter-select:focus {
    border-color: #27ae60;
    outline: none;
}

.filter-actions {
    display: flex;
    gap: 10px;
    margin-top: 23px;
}

.btn-generate {
    flex: 1;
    padding: 8px 15px;
    background: linear-gradient(135deg, #27ae60, #1e3c72);
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.btn-generate:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
}

.btn-export {
    width: 38px;
    height: 38px;
    background: #f8fafc;
    border: 2px solid #edf2f7;
    border-radius: 10px;
    color: #4a5568;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-export:hover {
    background: #27ae60;
    border-color: #27ae60;
    color: white;
}

/* Summary Cards */
.summary-row {
    margin-bottom: 25px;
}

.summary-card {
    background: white;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    display: flex;
    align-items: center;
    gap: 15px;
    transition: all 0.3s;
    border: 1px solid #edf2f7;
    margin-bottom: 15px;
}

.summary-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.summary-icon {
    width: 50px;
    height: 50px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.revenue-card .summary-icon {
    background: rgba(39, 174, 96, 0.1);
    color: #27ae60;
}

.students-card .summary-icon {
    background: rgba(30, 60, 114, 0.1);
    color: #1e3c72;
}

.completion-card .summary-icon {
    background: rgba(243, 156, 18, 0.1);
    color: #f39c12;
}

.attendance-card .summary-icon {
    background: rgba(155, 89, 182, 0.1);
    color: #9b59b6;
}

.summary-details {
    flex: 1;
}

.summary-label {
    display: block;
    font-size: 0.8rem;
    color: #718096;
    margin-bottom: 5px;
}

.summary-value {
    display: block;
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e3c72;
    line-height: 1.2;
    margin-bottom: 5px;
}

.summary-trend {
    font-size: 0.75rem;
    display: inline-flex;
    align-items: center;
    gap: 3px;
    padding: 2px 8px;
    border-radius: 50px;
}

.summary-trend.positive {
    background: rgba(39, 174, 96, 0.1);
    color: #27ae60;
}

.summary-trend.neutral {
    background: rgba(128, 128, 128, 0.1);
    color: #718096;
}

/* Report Charts */
.report-chart-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    margin-bottom: 25px;
    overflow: hidden;
    border: 1px solid #edf2f7;
    height: 100%;
}

.chart-header {
    padding: 15px 20px;
    border-bottom: 1px solid #edf2f7;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chart-title {
    display: flex;
    align-items: center;
    gap: 10px;
}

.chart-title i {
    color: #27ae60;
    font-size: 1.2rem;
}

.chart-title h5 {
    margin: 0;
    color: #1e3c72;
    font-size: 1rem;
    font-weight: 600;
}

.chart-legend {
    display: flex;
    gap: 15px;
}

.legend-item {
    font-size: 0.8rem;
    color: #718096;
    display: flex;
    align-items: center;
    gap: 5px;
}

.chart-body {
    padding: 20px;
    height: 300px;
    position: relative;
}

.chart-mini-legend {
    padding: 0 20px 20px;
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.mini-legend-item {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.75rem;
}

.color-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

/* Data Table Card */
.data-table-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    margin-bottom: 25px;
    overflow: hidden;
    border: 1px solid #edf2f7;
}

.table-header {
    padding: 15px 20px;
    border-bottom: 1px solid #edf2f7;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.table-title {
    display: flex;
    align-items: center;
    gap: 10px;
}

.table-title i {
    color: #27ae60;
}

.table-title h5 {
    margin: 0;
    color: #1e3c72;
    font-size: 1rem;
    font-weight: 600;
}

.table-actions {
    display: flex;
    gap: 10px;
}

.btn-excel, .btn-pdf {
    padding: 6px 12px;
    border: none;
    border-radius: 8px;
    font-size: 0.8rem;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    gap: 5px;
}

.btn-excel {
    background: #27ae60;
    color: white;
}

.btn-pdf {
    background: #e74c3c;
    color: white;
}

.btn-excel:hover, .btn-pdf:hover {
    transform: translateY(-2px);
    filter: brightness(1.1);
}

/* Modern Table */
.modern-table {
    width: 100%;
    border-collapse: collapse;
}

.modern-table th {
    background: #f8fafc;
    padding: 12px 20px;
    text-align: left;
    font-size: 0.8rem;
    font-weight: 600;
    color: #1e3c72;
    border-bottom: 2px solid #27ae60;
}

.modern-table td {
    padding: 12px 20px;
    border-bottom: 1px solid #edf2f7;
    font-size: 0.9rem;
    color: #4a5568;
}

.modern-table.compact td {
    padding: 10px 20px;
}

.course-name {
    display: flex;
    align-items: center;
    gap: 10px;
}

.course-color {
    width: 10px;
    height: 10px;
    border-radius: 3px;
    display: inline-block;
}

.revenue-cell {
    font-weight: 600;
    color: #27ae60;
}

.progress-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.progress-bar-container {
    flex: 1;
    height: 6px;
    background: #edf2f7;
    border-radius: 3px;
    overflow: hidden;
}

.progress-bar-fill {
    height: 100%;
    border-radius: 3px;
    transition: width 0.5s ease;
}

.progress-value {
    font-size: 0.8rem;
    font-weight: 600;
    min-width: 35px;
}

.growth-badge {
    padding: 3px 8px;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 3px;
}

.growth-badge.positive {
    background: rgba(39, 174, 96, 0.1);
    color: #27ae60;
}

.growth-badge.negative {
    background: rgba(231, 76, 60, 0.1);
    color: #e74c3c;
}

.status-badge {
    padding: 3px 10px;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 600;
}

.status-badge.active {
    background: rgba(39, 174, 96, 0.1);
    color: #27ae60;
}

/* Payment Methods */
.payment-methods-container {
    padding: 20px;
}

.payment-method-item {
    margin-bottom: 20px;
}

.method-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.method-name {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
    font-weight: 500;
}

.method-color {
    width: 10px;
    height: 10px;
    border-radius: 3px;
    display: inline-block;
}

.method-stats {
    display: flex;
    gap: 15px;
}

.method-count {
    font-size: 0.75rem;
    color: #718096;
}

.method-amount {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1e3c72;
}

.method-progress {
    display: flex;
    align-items: center;
    gap: 10px;
}

.progress-bar-bg {
    flex: 1;
    height: 6px;
    background: #edf2f7;
    border-radius: 3px;
    overflow: hidden;
}

.progress-percentage {
    font-size: 0.8rem;
    font-weight: 600;
    color: #1e3c72;
    min-width: 40px;
    text-align: right;
}

/* Export All Button */
.export-all-container {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin: 30px 0 20px;
}

.btn-export-all {
    padding: 12px 30px;
    border: none;
    border-radius: 50px;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #1e3c72;
    color: white;
    box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
}

.btn-export-all.excel {
    background: #27ae60;
    box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
}

.btn-export-all:hover {
    transform: translateY(-3px);
    filter: brightness(1.1);
}

/* Responsive */
@media (max-width: 768px) {
    .filter-actions {
        margin-top: 0;
    }
    
    .chart-body {
        height: 250px;
    }
    
    .export-all-container {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-export-all {
        width: 100%;
        justify-content: center;
    }
}
</style>

<?php include 'includes/footer.php'; ?>