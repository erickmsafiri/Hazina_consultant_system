<?php
$pageTitle = "Payment Tracking";
include 'includes/header.php';

// Sample payment data (in real system, this comes from database)
$payments = [
    [
        'id' => 1,
        'transaction_id' => 'MP' . time() . '001',
        'student_name' => 'John Doe',
        'student_phone' => '0688951408',
        'course' => 'SPSS Data Analysis',
        'amount' => 350000,
        'method' => 'M-Pesa',
        'status' => 'completed',
        'date' => '2026-02-23 10:30:45',
        'receipt_no' => 'RCT001'
    ],
    [
        'id' => 2,
        'transaction_id' => 'AT' . time() . '002',
        'student_name' => 'Jane Smith',
        'student_phone' => '0756123456',
        'course' => 'Digital Marketing',
        'amount' => 300000,
        'method' => 'Airtel Money',
        'status' => 'completed',
        'date' => '2026-02-23 09:15:20',
        'receipt_no' => 'RCT002'
    ],
    [
        'id' => 3,
        'transaction_id' => 'MP' . time() . '003',
        'student_name' => 'Peter Johnson',
        'student_phone' => '0678123456',
        'course' => 'Tour Plan & Costing',
        'amount' => 450000,
        'method' => 'M-Pesa',
        'status' => 'pending',
        'date' => '2026-02-22 16:20:10',
        'receipt_no' => 'RCT003'
    ],
    [
        'id' => 4,
        'transaction_id' => 'AT' . time() . '004',
        'student_name' => 'Mary Williams',
        'student_phone' => '0789123456',
        'course' => 'Pre-industrial Training',
        'amount' => 250000,
        'method' => 'Airtel Money',
        'status' => 'failed',
        'date' => '2026-02-22 14:30:00',
        'receipt_no' => 'RCT004'
    ],
    [
        'id' => 5,
        'transaction_id' => 'MP' . time() . '005',
        'student_name' => 'James Brown',
        'student_phone' => '0623123456',
        'course' => 'Business Writing',
        'amount' => 250000,
        'method' => 'M-Pesa',
        'status' => 'completed',
        'date' => '2026-02-21 11:45:30',
        'receipt_no' => 'RCT005'
    ]
];

// Calculate totals
$total_paid = 0;
$total_pending = 0;
$total_mpesa = 0;
$total_airtel = 0;

foreach ($payments as $payment) {
    if ($payment['status'] == 'completed') {
        $total_paid += $payment['amount'];
    } elseif ($payment['status'] == 'pending') {
        $total_pending += $payment['amount'];
    }
    
    if ($payment['method'] == 'M-Pesa') {
        $total_mpesa += $payment['amount'];
    } elseif ($payment['method'] == 'Airtel Money') {
        $total_airtel += $payment['amount'];
    }
}
?>

<!-- Filter Section -->
<div class="filter-section">
    <h5 class="filter-title"><i class="fas fa-filter me-2"></i>Filter Payments</h5>
    <div class="row">
        <div class="col-md-3">
            <label class="form-label">Date From</label>
            <input type="date" class="form-control" id="dateFrom" value="2026-02-01">
        </div>
        <div class="col-md-3">
            <label class="form-label">Date To</label>
            <input type="date" class="form-control" id="dateTo" value="2026-02-23">
        </div>
        <div class="col-md-2">
            <label class="form-label">Status</label>
            <select class="form-select" id="statusFilter">
                <option value="all">All</option>
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="failed">Failed</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Method</label>
            <select class="form-select" id="methodFilter">
                <option value="all">All</option>
                <option value="M-Pesa">M-Pesa</option>
                <option value="Airtel Money">Airtel Money</option>
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button class="btn btn-primary w-100" onclick="filterPayments()">
                <i class="fas fa-search me-2"></i>Apply Filter
            </button>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <div class="stat-value">Tsh <?php echo number_format($total_paid); ?></div>
            <div class="stat-label">Total Paid</div>
            <small class="text-success"><i class="fas fa-arrow-up"></i> +12.5%</small>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value">Tsh <?php echo number_format($total_pending); ?></div>
            <div class="stat-label">Pending Payments</div>
            <small class="text-warning"><i class="fas fa-clock"></i> Awaiting</small>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-phone-alt"></i>
            </div>
            <div class="stat-value">Tsh <?php echo number_format($total_mpesa); ?></div>
            <div class="stat-label">M-Pesa Total</div>
            <small><i class="fas fa-check-circle text-success"></i> <?php echo count(array_filter($payments, function($p) { return $p['method'] == 'M-Pesa' && $p['status'] == 'completed'; })); ?> transactions</small>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-wifi"></i>
            </div>
            <div class="stat-value">Tsh <?php echo number_format($total_airtel); ?></div>
            <div class="stat-label">Airtel Money Total</div>
            <small><i class="fas fa-check-circle text-success"></i> <?php echo count(array_filter($payments, function($p) { return $p['method'] == 'Airtel Money' && $p['status'] == 'completed'; })); ?> transactions</small>
        </div>
    </div>
</div>

<!-- Payment Table -->
<div class="table-container">
    <div class="table-header">
        <h5><i class="fas fa-credit-card me-2"></i>Payment Transactions</h5>
        <div>
            <button class="btn btn-success me-2" onclick="exportToExcel()">
                <i class="fas fa-file-excel me-2"></i>Export Excel
            </button>
            <button class="btn btn-danger me-2" onclick="exportToPDF()">
                <i class="fas fa-file-pdf me-2"></i>Export PDF
            </button>
            <button class="btn btn-primary" onclick="printReport()">
                <i class="fas fa-print me-2"></i>Print
            </button>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover" id="paymentsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Transaction ID</th>
                    <th>Student Name</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Receipt</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td>#<?php echo $payment['id']; ?></td>
                    <td><small><?php echo $payment['transaction_id']; ?></small></td>
                    <td><strong><?php echo $payment['student_name']; ?></strong></td>
                    <td><?php echo $payment['student_phone']; ?></td>
                    <td><?php echo $payment['course']; ?></td>
                    <td><strong>Tsh <?php echo number_format($payment['amount']); ?></strong></td>
                    <td>
                        <?php if ($payment['method'] == 'M-Pesa'): ?>
                            <span class="badge bg-info">M-Pesa</span>
                        <?php else: ?>
                            <span class="badge bg-warning">Airtel</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($payment['status'] == 'completed'): ?>
                            <span class="badge-paid">Paid</span>
                        <?php elseif ($payment['status'] == 'pending'): ?>
                            <span class="badge-pending">Pending</span>
                        <?php else: ?>
                            <span class="badge-failed">Failed</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo date('d/m/Y H:i', strtotime($payment['date'])); ?></td>
                    <td>
                        <button class="btn-action btn-download" onclick="downloadReceipt('<?php echo $payment['receipt_no']; ?>')">
                            <i class="fas fa-download"></i>
                        </button>
                    </td>
                    <td>
                        <button class="btn-action btn-view" onclick="viewPayment(<?php echo $payment['id']; ?>)">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn-action btn-edit" onclick="editPayment(<?php echo $payment['id']; ?>)">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Summary Row -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="bg-light p-3 rounded">
                <strong>Summary:</strong> 
                <?php echo count($payments); ?> total transactions | 
                <?php echo count(array_filter($payments, function($p) { return $p['status'] == 'completed'; })); ?> completed |
                <?php echo count(array_filter($payments, function($p) { return $p['status'] == 'pending'; })); ?> pending |
                <?php echo count(array_filter($payments, function($p) { return $p['status'] == 'failed'; })); ?> failed
            </div>
        </div>
        <div class="col-md-6 text-end">
            <div class="bg-light p-3 rounded">
                <strong>Total Amount:</strong> Tsh <?php echo number_format($total_paid + $total_pending); ?>
            </div>
        </div>
    </div>
</div>

<!-- Payment Details Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-receipt me-2"></i>Payment Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="paymentDetails">
                <!-- Payment details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="downloadReceipt()">
                    <i class="fas fa-download me-2"></i>Download Receipt
                </button>
                <button type="button" class="btn btn-primary" onclick="printReceipt()">
                    <i class="fas fa-print me-2"></i>Print
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Payment Modal -->
<div class="modal fade" id="editPaymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Update Payment Status
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editPaymentForm">
                    <input type="hidden" id="editPaymentId">
                    <div class="mb-3">
                        <label class="form-label">Transaction ID</label>
                        <input type="text" class="form-control" id="editTransactionId" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="editStudentName" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="text" class="form-control" id="editAmount" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="editStatus">
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" id="editNotes" rows="3" placeholder="Add notes about this payment..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updatePaymentStatus()">Update Status</button>
            </div>
        </div>
    </div>
</div>

<script>
let payments = <?php echo json_encode($payments); ?>;

// View payment details
function viewPayment(id) {
    const payment = payments.find(p => p.id == id);
    if (!payment) return;
    
    const modalBody = document.getElementById('paymentDetails');
    modalBody.innerHTML = `
        <div class="row">
            <div class="col-md-6">
                <div class="bg-light p-3 rounded mb-3">
                    <h6 class="text-primary">Student Information</h6>
                    <p><strong>Name:</strong> ${payment.student_name}</p>
                    <p><strong>Phone:</strong> ${payment.student_phone}</p>
                    <p><strong>Course:</strong> ${payment.course}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded mb-3">
                    <h6 class="text-primary">Payment Information</h6>
                    <p><strong>Transaction ID:</strong> ${payment.transaction_id}</p>
                    <p><strong>Amount:</strong> Tsh ${payment.amount.toLocaleString()}</p>
                    <p><strong>Method:</strong> ${payment.method}</p>
                    <p><strong>Status:</strong> <span class="badge-${payment.status}">${payment.status}</span></p>
                    <p><strong>Date:</strong> ${payment.date}</p>
                    <p><strong>Receipt No:</strong> ${payment.receipt_no}</p>
                </div>
            </div>
        </div>
    `;
    
    new bootstrap.Modal(document.getElementById('paymentModal')).show();
}

// Edit payment
function editPayment(id) {
    const payment = payments.find(p => p.id == id);
    if (!payment) return;
    
    document.getElementById('editPaymentId').value = payment.id;
    document.getElementById('editTransactionId').value = payment.transaction_id;
    document.getElementById('editStudentName').value = payment.student_name;
    document.getElementById('editAmount').value = 'Tsh ' + payment.amount.toLocaleString();
    document.getElementById('editStatus').value = payment.status;
    
    new bootstrap.Modal(document.getElementById('editPaymentModal')).show();
}

// Update payment status
function updatePaymentStatus() {
    const id = document.getElementById('editPaymentId').value;
    const newStatus = document.getElementById('editStatus').value;
    const notes = document.getElementById('editNotes').value;
    
    // Find and update payment
    const payment = payments.find(p => p.id == id);
    if (payment) {
        payment.status = newStatus;
        alert(`Payment #${id} status updated to ${newStatus}`);
    }
    
    bootstrap.Modal.getInstance(document.getElementById('editPaymentModal')).hide();
    location.reload(); // Refresh to show updated status
}

// Download receipt
function downloadReceipt(receiptNo) {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    const payment = payments.find(p => p.receipt_no == receiptNo);
    if (!payment) return;
    
    // Add logo
    doc.setFillColor(30, 60, 114);
    doc.roundedRect(20, 15, 20, 20, 3, 3, 'F');
    doc.setTextColor(255, 255, 255);
    doc.setFontSize(12);
    doc.text('H', 27, 28);
    
    // Company details
    doc.setTextColor(30, 60, 114);
    doc.setFontSize(20);
    doc.setFont(undefined, 'bold');
    doc.text('Hazina Consultancy', 45, 25);
    doc.setFontSize(10);
    doc.setFont(undefined, 'normal');
    doc.setTextColor(39, 174, 96);
    doc.text('Maarifa ni hazina', 45, 32);
    
    // Receipt title
    doc.setDrawColor(30, 60, 114);
    doc.line(20, 40, 190, 40);
    doc.setFontSize(16);
    doc.setTextColor(30, 60, 114);
    doc.text('PAYMENT RECEIPT', 20, 50);
    
    // Receipt info
    doc.setFontSize(10);
    doc.setTextColor(0, 0, 0);
    doc.text(`Receipt No: ${payment.receipt_no}`, 150, 45);
    doc.text(`Date: ${payment.date}`, 150, 52);
    
    // Details
    doc.setFontSize(12);
    doc.setFont(undefined, 'bold');
    doc.text('PAYMENT DETAILS', 20, 65);
    doc.setFont(undefined, 'normal');
    doc.setFontSize(10);
    doc.text(`Student Name: ${payment.student_name}`, 20, 75);
    doc.text(`Phone Number: ${payment.student_phone}`, 20, 82);
    doc.text(`Course: ${payment.course}`, 20, 89);
    doc.text(`Amount: Tsh ${payment.amount.toLocaleString()}`, 20, 96);
    doc.text(`Payment Method: ${payment.method}`, 20, 103);
    doc.text(`Transaction ID: ${payment.transaction_id}`, 20, 110);
    doc.text(`Status: ${payment.status.toUpperCase()}`, 20, 117);
    
    // Footer
    doc.setDrawColor(39, 174, 96);
    doc.line(20, 130, 190, 130);
    doc.setFontSize(8);
    doc.setTextColor(128, 128, 128);
    doc.text('This is a computer generated receipt. No signature required.', 20, 140);
    doc.text('Thank you for choosing Hazina Consultancy!', 20, 145);
    
    doc.save(`receipt_${payment.receipt_no}.pdf`);
}

// Export to Excel
function exportToExcel() {
    const wsData = [
        ['Transaction ID', 'Student Name', 'Phone', 'Course', 'Amount', 'Method', 'Status', 'Date'],
        ...payments.map(p => [
            p.transaction_id,
            p.student_name,
            p.student_phone,
            p.course,
            p.amount,
            p.method,
            p.status,
            p.date
        ])
    ];
    
    const wb = XLSX.utils.book_new();
    const ws = XLSX.utils.aoa_to_sheet(wsData);
    XLSX.utils.book_append_sheet(wb, ws, 'Payments');
    XLSX.writeFile(wb, 'payments_report.xlsx');
}

// Export to PDF
function exportToPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    doc.setFontSize(18);
    doc.text('Hazina Consultancy', 20, 20);
    doc.setFontSize(12);
    doc.text('Payment Report', 20, 30);
    doc.text('Date: ' + new Date().toLocaleDateString(), 20, 40);
    
    let y = 50;
    payments.forEach((p, i) => {
        doc.text(`${i+1}. ${p.student_name} - ${p.course} - Tsh ${p.amount.toLocaleString()} - ${p.status}`, 20, y);
        y += 7;
    });
    
    doc.save('payments_report.pdf');
}

// Print report
function printReport() {
    window.print();
}

// Filter payments
function filterPayments() {
    const dateFrom = document.getElementById('dateFrom').value;
    const dateTo = document.getElementById('dateTo').value;
    const status = document.getElementById('statusFilter').value;
    const method = document.getElementById('methodFilter').value;
    
    alert(`Filtering payments from ${dateFrom} to ${dateTo}, Status: ${status}, Method: ${method}`);
    // In real system, this would reload data from server
}

// Initialize DataTable
$(document).ready(function() {
    $('#paymentsTable').DataTable({
        pageLength: 10,
        order: [[8, 'desc']],
        language: {
            search: "Search payments:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ payments"
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>