<?php
$pageTitle = "Dashboard";
include 'includes/header.php';
?>

<!-- Stats Cards -->
<div class="row">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-value">Tsh 1,350,000</div>
            <div class="stat-label">Today's Revenue</div>
            <small class="text-success"><i class="fas fa-arrow-up"></i> +15%</small>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar"></i>
            </div>
            <div class="stat-value">Tsh 4.2M</div>
            <div class="stat-label">Monthly Revenue</div>
            <small class="text-success"><i class="fas fa-arrow-up"></i> +8.3%</small>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">156</div>
            <div class="stat-label">Active Students</div>
            <small><i class="fas fa-user-plus text-success"></i> +12 new</small>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">24</div>
            <div class="stat-label">Today's Payments</div>
            <small><i class="fas fa-clock text-warning"></i> 3 pending</small>
        </div>
    </div>
</div>
<!-- Charts Row - FIXED LAYOUT -->
<div class="row charts-row">
    <div class="col-xl-8 col-lg-7 col-md-12">
        <div class="chart-card revenue-card">
            <div class="chart-header">
                <div class="chart-title">
                    <i class="fas fa-chart-line"></i>
                    <h5>Revenue Overview</h5>
                </div>
                <div class="chart-actions">
                    <select class="chart-period-select" id="revenuePeriod">
                        <option value="weekly">This Week</option>
                        <option value="monthly" selected>This Month</option>
                        <option value="yearly">This Year</option>
                    </select>
                    <button class="chart-refresh-btn" onclick="refreshRevenueChart()">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
            </div>
            <div class="chart-body">
                <canvas id="revenueChart" style="width:100%; height:300px;"></canvas>
            </div>
            <div class="chart-footer">
                <div class="revenue-stats">
                    <div class="stat-item">
                        <span class="stat-label">Total Revenue</span>
                        <span class="stat-value">Tsh 4,250,000</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Growth</span>
                        <span class="stat-value text-success">+23.5%</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Avg. Daily</span>
                        <span class="stat-value">Tsh 141,667</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4 col-lg-5 col-md-12">
        <div class="chart-card payment-card">
            <div class="chart-header">
                <div class="chart-title">
                    <i class="fas fa-chart-pie"></i>
                    <h5>Payment Methods</h5>
                </div>
                <div class="chart-legend">
                    <span class="legend-item mpesa"><i class="fas fa-circle"></i> M-Pesa</span>
                    <span class="legend-item airtel"><i class="fas fa-circle"></i> Airtel</span>
                </div>
            </div>
            <div class="chart-body">
                <canvas id="paymentChart" style="width:100%; height:250px;"></canvas>
            </div>
            <div class="payment-breakdown">
                <div class="breakdown-item mpesa">
                    <div class="breakdown-label">
                        <i class="fas fa-phone-alt"></i>
                        <span>M-Pesa</span>
                    </div>
                    <div class="breakdown-bar">
                        <div class="bar-fill" style="width: 67%"></div>
                    </div>
                    <div class="breakdown-value">Tsh 2,850,000</div>
                    <div class="breakdown-percent">67%</div>
                </div>
                <div class="breakdown-item airtel">
                    <div class="breakdown-label">
                        <i class="fas fa-wifi"></i>
                        <span>Airtel Money</span>
                    </div>
                    <div class="breakdown-bar">
                        <div class="bar-fill" style="width: 33%"></div>
                    </div>
                    <div class="breakdown-value">Tsh 1,400,000</div>
                    <div class="breakdown-percent">33%</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Payments -->
<div class="table-container mt-4">
    <div class="table-header">
        <h5><i class="fas fa-clock me-2"></i>Recent Payments</h5>
        <a href="payments.php" class="btn btn-sm btn-primary">View All</a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Status</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>John Doe</strong></td>
                <td>SPSS Training</td>
                <td>Tsh 350,000</td>
                <td><span class="badge bg-info">M-Pesa</span></td>
                <td><span class="badge-paid">Paid</span></td>
                <td>10:30 AM</td>
                <td>
                    <button class="btn-action btn-view" onclick="viewPayment(1)">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td><strong>Jane Smith</strong></td>
                <td>Digital Marketing</td>
                <td>Tsh 300,000</td>
                <td><span class="badge bg-warning">Airtel</span></td>
                <td><span class="badge-paid">Paid</span></td>
                <td>09:15 AM</td>
                <td>
                    <button class="btn-action btn-view" onclick="viewPayment(2)">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td><strong>Peter Johnson</strong></td>
                <td>Tour Planning</td>
                <td>Tsh 450,000</td>
                <td><span class="badge bg-info">M-Pesa</span></td>
                <td><span class="badge-pending">Pending</span></td>
                <td>Yesterday</td>
                <td>
                    <button class="btn-action btn-view" onclick="viewPayment(3)">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
// Revenue Chart
const ctx1 = document.getElementById('revenueChart').getContext('2d');
new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Revenue (Tsh)',
            data: [450000, 680000, 520000, 750000, 820000, 910000, 1350000],
            borderColor: '#27ae60',
            backgroundColor: 'rgba(39, 174, 96, 0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        }
    }
});

// Payment Methods Chart
const ctx2 = document.getElementById('paymentChart').getContext('2d');
new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['M-Pesa', 'Airtel Money'],
        datasets: [{
            data: [2850000, 1400000],
            backgroundColor: ['#1e3c72', '#27ae60'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>

<?php include 'includes/footer.php'; ?>