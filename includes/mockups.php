<?php
/**
 * Quantyx Labs — Production-Grade Application UI Mockups
 * --------------------------------------------------------
 * High-fidelity, responsive software interface mockups demonstrating
 * real production systems built by Quantyx Labs.
 */

function render_product_mockup($product_id) {
    switch ($product_id) {
        case 'pearlpay':
            ?>
            <div class="ui-mockup-frame">
                <div class="ui-mockup-bar">
                    <div class="ui-dots">
                        <span class="ui-dot red"></span>
                        <span class="ui-dot yellow"></span>
                        <span class="ui-dot green"></span>
                    </div>
                    <div class="ui-url-chip">
                        <span class="ui-lock-icon"><?= q_icon('lock-closed', '', 12) ?></span>
                        <span>app.pearlpay.co.ke/payroll/cycles/<?= date('Y-m') ?></span>
                    </div>
                    <div class="ui-env-badge">ARCHITECTURE MODEL · HRMS</div>
                </div>
                <div class="ui-mockup-body">
                    <!-- Top Summary Bar -->
                    <div class="ui-top-bar">
                        <div>
                            <div class="ui-title-sub">Commercial Enterprise EA · Multi-Entity Payroll</div>
                            <div class="ui-title-main">Monthly Payroll Run — <?= date('F Y') ?></div>
                        </div>
                        <div class="ui-actions">
                            <span class="ui-pill-success">
                                <span class="pulse-dot green"></span>
                                KRA Statutory Model
                            </span>
                            <button class="ui-btn-accent" type="button">Approve & Disburse</button>
                        </div>
                    </div>

                    <!-- KPI Cards Grid -->
                    <div class="ui-kpi-grid">
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Gross Payroll</div>
                            <div class="ui-kpi-num">KES 3,842,500</div>
                            <div class="ui-kpi-meta text-emerald">148 Active Employees</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">KRA PAYE Tax</div>
                            <div class="ui-kpi-num">KES 512,800</div>
                            <div class="ui-kpi-meta">Tiered Brackets + Relief</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">NSSF (Tier I & II)</div>
                            <div class="ui-kpi-num">KES 72,000</div>
                            <div class="ui-kpi-meta">Act 2013 Compliant</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Housing Levy (1.5%)</div>
                            <div class="ui-kpi-num">KES 57,638</div>
                            <div class="ui-kpi-meta">Employer Matched</div>
                        </div>
                    </div>

                    <!-- Mini Data Table -->
                    <div class="ui-table-wrap">
                        <div class="ui-table-header">
                            <span>Employee Name & PIN</span>
                            <span>Department</span>
                            <span>Gross Pay</span>
                            <span>Statutory</span>
                            <span>Net Pay</span>
                            <span>Disbursement</span>
                        </div>
                        <div class="ui-table-row">
                            <div class="ui-cell-name">
                                <strong>David Mwangi</strong>
                                <small>KRA PIN: A004928172M</small>
                            </div>
                            <div class="ui-cell-dept">Engineering Lead</div>
                            <div class="ui-cell-val">KES 245,000</div>
                            <div class="ui-cell-val text-muted">- KES 58,240</div>
                            <div class="ui-cell-val highlight">KES 186,760</div>
                            <div class="ui-cell-status"><span class="ui-tag-done">EFT Ready</span></div>
                        </div>
                        <div class="ui-table-row">
                            <div class="ui-cell-name">
                                <strong>Faith Chebet</strong>
                                <small>KRA PIN: A008194301K</small>
                            </div>
                            <div class="ui-cell-dept">Operations Manager</div>
                            <div class="ui-cell-val">KES 185,000</div>
                            <div class="ui-cell-val text-muted">- KES 41,890</div>
                            <div class="ui-cell-val highlight">KES 143,110</div>
                            <div class="ui-cell-status"><span class="ui-tag-done">M-Pesa B2C</span></div>
                        </div>
                        <div class="ui-table-row">
                            <div class="ui-cell-name">
                                <strong>Kevin Ochieng</strong>
                                <small>KRA PIN: A005192834P</small>
                            </div>
                            <div class="ui-cell-dept">Supply Chain Analyst</div>
                            <div class="ui-cell-val">KES 120,000</div>
                            <div class="ui-cell-val text-muted">- KES 25,480</div>
                            <div class="ui-cell-val highlight">KES 94,520</div>
                            <div class="ui-cell-status"><span class="ui-tag-done">Pesalink</span></div>
                        </div>
                    </div>

                    <!-- Telemetry Footer -->
                    <div class="ui-telemetry-strip">
                        <span><span>•</span> 36 Integrated Payroll Modules</span>
                        <span><span>•</span> SHA (NHIF) Ready</span>
                        <span><span>•</span> Automated KRA P9 Tax Card Generation</span>
                        <span><span>•</span> Bank File Hash: <code>e8b4...d91c</code></span>
                    </div>
                </div>
            </div>
            <?php
            break;

        case 'healthpoint':
            ?>
            <div class="ui-mockup-frame">
                <div class="ui-mockup-bar">
                    <div class="ui-dots">
                        <span class="ui-dot red"></span>
                        <span class="ui-dot yellow"></span>
                        <span class="ui-dot green"></span>
                    </div>
                    <div class="ui-url-chip">
                        <span class="ui-lock-icon"><?= q_icon('lock-closed', '', 12) ?></span>
                        <span>emr.healthpoint.co.ke/clinical/patient/HP-9421</span>
                    </div>
                    <div class="ui-env-badge">CLINICAL EMR · ARCHITECTURE MODEL</div>
                </div>
                <div class="ui-mockup-body">
                    <div class="ui-top-bar">
                        <div>
                            <div class="ui-title-sub">Clinical Health Facility · Illustrative Patient Chart</div>
                            <div class="ui-title-main">Patient Record Model: Sample Patient (Age 34)</div>
                        </div>
                        <div class="ui-actions">
                            <span class="ui-pill-success">
                                <span class="pulse-dot green"></span>
                                SHA / Insurance Pre-Authorized
                            </span>
                        </div>
                    </div>

                    <div class="ui-split-grid">
                        <!-- Left: Clinical Encounter Notes -->
                        <div class="ui-panel-card">
                            <div class="ui-panel-title">
                                <?= q_icon('heart', '', 14) ?> Triage & Consultation Notes
                            </div>
                            <div class="ui-vitals-row">
                                <div class="vital-item"><span>BP:</span> <strong>120/78 mmHg</strong></div>
                                <div class="vital-item"><span>Temp:</span> <strong>36.8°C</strong></div>
                                <div class="vital-item"><span>SpO2:</span> <strong>99%</strong></div>
                                <div class="vital-item"><span>HR:</span> <strong>74 bpm</strong></div>
                            </div>
                            <div class="ui-doctor-notes">
                                <div class="note-heading">Primary Diagnosis (ICD-10)</div>
                                <div class="diagnosis-badge">J06.9 Acute Upper Respiratory Infection</div>
                                <p>Patient reports 3-day history of rhinitis, sore throat, and mild headache. Clear chest auscultation. Prescribed symptomatic relief and supportive hydration.</p>
                            </div>
                        </div>

                        <!-- Right: Pharmacy & Lab Order -->
                        <div class="ui-panel-card">
                            <div class="ui-panel-title">
                                <?= q_icon('shopping-bag', '', 14) ?> Digital Pharmacy Dispensing
                            </div>
                            <div class="rx-item-list">
                                <div class="rx-item">
                                    <div class="rx-meta">
                                        <strong>Amoxicillin 500mg Caps</strong>
                                        <small>1 Cap TDS x 5 Days · Batch #AMX-2026</small>
                                    </div>
                                    <span class="ui-badge-available">In Stock (342)</span>
                                </div>
                                <div class="rx-item">
                                    <div class="rx-meta">
                                        <strong>Cetirizine 10mg Tabs</strong>
                                        <small>1 Tab OD Nocté x 7 Days · Batch #CTZ-1190</small>
                                    </div>
                                    <span class="ui-badge-available">In Stock (180)</span>
                                </div>
                                <div class="rx-item">
                                    <div class="rx-meta">
                                        <strong>Paracetamol 1000mg</strong>
                                        <small>1 Tab QDS PRN x 3 Days · Batch #PCM-8841</small>
                                    </div>
                                    <span class="ui-badge-available">In Stock (620)</span>
                                </div>
                            </div>
                            <div class="rx-footer">
                                <span>Automated Batch Deduct</span>
                                <strong>Prescription Signed by Dr. Gitau (KMPDC #8412)</strong>
                            </div>
                        </div>
                    </div>

                    <div class="ui-telemetry-strip">
                        <span><span>•</span> Full Outpatient & Inpatient EMR</span>
                        <span><span>•</span> ICD-10 Diagnostic Indexing</span>
                        <span><span>•</span> Real-Time Pharmacy Expiry Tracking</span>
                        <span><span>•</span> Zero Paper Folders</span>
                    </div>
                </div>
            </div>
            <?php
            break;

        case 'healthbot':
            ?>
            <div class="ui-mockup-frame">
                <div class="ui-mockup-bar">
                    <div class="ui-dots">
                        <span class="ui-dot red"></span>
                        <span class="ui-dot yellow"></span>
                        <span class="ui-dot green"></span>
                    </div>
                    <div class="ui-url-chip">
                        <span>WhatsApp Business Cloud API · Health Point Verified Service</span>
                    </div>
                    <div class="ui-env-badge violet">24/7 AI AGENT</div>
                </div>
                <div class="ui-mockup-body wa-chat-container">
                    <div class="wa-header">
                        <div class="wa-avatar">HP</div>
                        <div class="wa-info">
                            <div class="wa-name">Health Point Medical Assistant <span class="wa-verified">✓</span></div>
                            <div class="wa-status">Official WhatsApp Business Account · Automated 24/7</div>
                        </div>
                    </div>
                    <div class="wa-chat-body">
                        <div class="wa-bubble incoming">
                            <p>Hello! Welcome to <strong>Health Point Kenya</strong>. I can help you find nearby verified medicines, schedule hospital appointments, or consult an on-duty clinician. How may I assist you today?</p>
                            <span class="wa-time">10:41 AM</span>
                        </div>
                        <div class="wa-bubble outgoing">
                            <p>Hi, I am in Kilimani, Nairobi. I have a prescription for Amoxicillin 500mg and need it delivered urgently.</p>
                            <span class="wa-time">10:42 AM</span>
                        </div>
                        <div class="wa-bubble incoming">
                            <p>I located <strong>2 accredited partner pharmacies</strong> within 1.5 km of Kilimani with verified batch stock in real-time:</p>
                            <div class="wa-card-item">
                                <strong>1. Apex Chemist Kilimani</strong> · 600m away<br>
                                <small>Amoxicillin 500mg (Box of 20) · KES 450 · Ready for Instant Dispatch</small>
                            </div>
                            <div class="wa-card-item">
                                <strong>2. PrimeCare Pharmacy Hurlingham</strong> · 1.2km away<br>
                                <small>Amoxicillin 500mg (Box of 20) · KES 420 · Dispatch in 15 mins</small>
                            </div>
                            <p>Tap an option below to proceed:</p>
                            <div class="wa-buttons-list">
                                <button type="button" class="wa-btn">🛵 Request Instant Delivery</button>
                                <button type="button" class="wa-btn">📍 Reserve for Self Pickup</button>
                                <button type="button" class="wa-btn">👨‍⚕️ Speak to Pharmacist</button>
                            </div>
                            <span class="wa-time">10:42 AM</span>
                        </div>
                    </div>
                    <div class="ui-telemetry-strip">
                        <span><span>•</span> Response Latency: 1.1s</span>
                        <span><span>•</span> End-to-End Encrypted</span>
                        <span><span>•</span> Zero Mobile App Install Needed</span>
                        <span><span>•</span> Geolocation Delivery Dispatch</span>
                    </div>
                </div>
            </div>
            <?php
            break;

        case 'quantyxls':
            ?>
            <div class="ui-mockup-frame">
                <div class="ui-mockup-bar">
                    <div class="ui-dots">
                        <span class="ui-dot red"></span>
                        <span class="ui-dot yellow"></span>
                        <span class="ui-dot green"></span>
                    </div>
                    <div class="ui-url-chip">
                        <span class="ui-lock-icon"><?= q_icon('lock-closed', '', 12) ?></span>
                        <span>sacco.quantyxls.com/loans/analytics</span>
                    </div>
                    <div class="ui-env-badge amber">MICROFINANCE CORE · ARCHITECTURE MODEL</div>
                </div>
                <div class="ui-mockup-body">
                    <div class="ui-top-bar">
                        <div>
                            <div class="ui-title-sub">SACCO Lending System · Multi-Tenant Amortization Model</div>
                            <div class="ui-title-main">Loan Portfolio & Daraja STK Push Telemetry</div>
                        </div>
                        <div class="ui-actions">
                            <span class="ui-pill-success">
                                <span class="pulse-dot green"></span>
                                Daraja STK Webhook Live
                            </span>
                        </div>
                    </div>

                    <div class="ui-kpi-grid">
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Active Loan Portfolio</div>
                            <div class="ui-kpi-num">KES 48,650,000</div>
                            <div class="ui-kpi-meta text-emerald">1,420 Active Borrowers</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Today's Collections</div>
                            <div class="ui-kpi-num">KES 1,240,500</div>
                            <div class="ui-kpi-meta">M-Pesa Express STK Push</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Portfolio at Risk (PAR 30)</div>
                            <div class="ui-kpi-num text-emerald">1.82%</div>
                            <div class="ui-kpi-meta">Target: &lt; 3.0% Industry Benchmark</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Loan Guarantee Fund (LGF)</div>
                            <div class="ui-kpi-num">KES 12,400,000</div>
                            <div class="ui-kpi-meta">Peer Guarantor Collateral</div>
                        </div>
                    </div>

                    <div class="ui-table-wrap">
                        <div class="ui-table-header">
                            <span>Borrower / Group</span>
                            <span>Product</span>
                            <span>Principal</span>
                            <span>M-Pesa STK Callback</span>
                            <span>Risk Score</span>
                            <span>Status</span>
                        </div>
                        <div class="ui-table-row">
                            <div class="ui-cell-name">
                                <strong>Tumaini Traders Group</strong>
                                <small>Group ID: G-881 · 12 Members</small>
                            </div>
                            <div class="ui-cell-dept">Biashara Boost</div>
                            <div class="ui-cell-val">KES 350,000</div>
                            <div class="ui-cell-val text-emerald">STK Push Succeeded (KES 29,160)</div>
                            <div class="ui-cell-val"><span class="ui-tag-high">A+ (920/1000)</span></div>
                            <div class="ui-cell-status"><span class="ui-tag-done">Active / Current</span></div>
                        </div>
                        <div class="ui-table-row">
                            <div class="ui-cell-name">
                                <strong>James Kariuki</strong>
                                <small>Member #M-40192</small>
                            </div>
                            <div class="ui-cell-dept">Asset Finance</div>
                            <div class="ui-cell-val">KES 180,000</div>
                            <div class="ui-cell-val text-emerald">STK Push Succeeded (KES 18,200)</div>
                            <div class="ui-cell-val"><span class="ui-tag-high">A (840/1000)</span></div>
                            <div class="ui-cell-status"><span class="ui-tag-done">Active / Current</span></div>
                        </div>
                    </div>

                    <div class="ui-telemetry-strip">
                        <span><span>•</span> Safaricom Daraja 2.0 Integration</span>
                        <span><span>•</span> Instant Double-Entry Ledger Posting</span>
                        <span><span>•</span> Automated SMS Reminders</span>
                        <span><span>•</span> Reducing Balance & Flat Amortization</span>
                    </div>
                </div>
            </div>
            <?php
            break;

        case 'stockcounter':
            ?>
            <div class="ui-mockup-frame">
                <div class="ui-mockup-bar">
                    <div class="ui-dots">
                        <span class="ui-dot red"></span>
                        <span class="ui-dot yellow"></span>
                        <span class="ui-dot green"></span>
                    </div>
                    <div class="ui-url-chip">
                        <span class="ui-lock-icon"><?= q_icon('lock-closed', '', 12) ?></span>
                        <span>inventory.stockcounter.co.ke/multi-warehouse</span>
                    </div>
                    <div class="ui-env-badge">SUPPLY CHAIN · ARCHITECTURE MODEL</div>
                </div>
                <div class="ui-mockup-body">
                    <div class="ui-top-bar">
                        <div>
                            <div class="ui-title-sub">Multi-Branch Distribution Hub · Stock Model</div>
                            <div class="ui-title-main">Multi-Warehouse Inventory & Threshold Telemetry</div>
                        </div>
                        <div class="ui-actions">
                            <button class="ui-btn-accent" type="button">+ Stock Transfer Slip</button>
                        </div>
                    </div>

                    <div class="ui-kpi-grid">
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Active SKUs Tracked</div>
                            <div class="ui-kpi-num">3,480 SKUs</div>
                            <div class="ui-kpi-meta text-emerald">Nairobi · Mombasa · Kisumu</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Total Stock Valuation</div>
                            <div class="ui-kpi-num">KES 84,200,000</div>
                            <div class="ui-kpi-meta">FIFO Cost Calculated</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Transfers in Transit</div>
                            <div class="ui-kpi-num">8 Active Slips</div>
                            <div class="ui-kpi-meta">GPS Geotracked</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Reorder Triggers</div>
                            <div class="ui-kpi-num text-amber">4 Thresholds Met</div>
                            <div class="ui-kpi-meta">Auto Purchase Orders Generated</div>
                        </div>
                    </div>

                    <div class="ui-table-wrap">
                        <div class="ui-table-header">
                            <span>SKU Code / Description</span>
                            <span>Central Hub (NBO)</span>
                            <span>Coast Hub (MSA)</span>
                            <span>Lake Hub (KIS)</span>
                            <span>Status</span>
                        </div>
                        <div class="ui-table-row">
                            <div class="ui-cell-name">
                                <strong>SKU-8921-X · Solar Inverter 3kVA</strong>
                                <small>Batch #2026-Q1 · Serial Tracked</small>
                            </div>
                            <div class="ui-cell-val">142 Units</div>
                            <div class="ui-cell-val">68 Units</div>
                            <div class="ui-cell-val">34 Units</div>
                            <div class="ui-cell-status"><span class="ui-tag-done">Optimal Stock</span></div>
                        </div>
                        <div class="ui-table-row">
                            <div class="ui-cell-name">
                                <strong>SKU-4412-M · Deep Cycle 200Ah Gel</strong>
                                <small>Batch #2026-Q2 · Heavy Cargo</small>
                            </div>
                            <div class="ui-cell-val">12 Units (Low)</div>
                            <div class="ui-cell-val">40 Units</div>
                            <div class="ui-cell-val">15 Units</div>
                            <div class="ui-cell-status"><span class="ui-tag-warning">Reorder Sent</span></div>
                        </div>
                    </div>

                    <div class="ui-telemetry-strip">
                        <span><span>•</span> Barcode & Handheld QR Scanning</span>
                        <span><span>•</span> Automated Purchase Order Dispatch</span>
                        <span><span>•</span> Shrinkage & Discrepancy Audits</span>
                        <span><span>•</span> Multi-Currency Valuation</span>
                    </div>
                </div>
            </div>
            <?php
            break;

        case 'sortie':
            ?>
            <div class="ui-mockup-frame">
                <div class="ui-mockup-bar">
                    <div class="ui-dots">
                        <span class="ui-dot red"></span>
                        <span class="ui-dot yellow"></span>
                        <span class="ui-dot green"></span>
                    </div>
                    <div class="ui-url-chip">
                        <span class="ui-lock-icon"><?= q_icon('lock-closed', '', 12) ?></span>
                        <span>dispatch.digitalsortie.com/board/live</span>
                    </div>
                    <div class="ui-env-badge green">FIELD DISPATCH · ARCHITECTURE MODEL</div>
                </div>
                <div class="ui-mockup-body">
                    <div class="ui-top-bar">
                        <div>
                            <div class="ui-title-sub">Network Maintenance Operations · Regional Hub</div>
                            <div class="ui-title-main">Technician Route & Milestone Dispatch Console</div>
                        </div>
                        <div class="ui-actions">
                            <span class="ui-pill-success">
                                <span class="pulse-dot green"></span>
                                22 Field Units Online
                            </span>
                        </div>
                    </div>

                    <div class="ui-kpi-grid">
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Work Orders Scheduled</div>
                            <div class="ui-kpi-num">48 Jobs Today</div>
                            <div class="ui-kpi-meta text-emerald">36 Completed (75%)</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Average On-Site Duration</div>
                            <div class="ui-kpi-num">38 Minutes</div>
                            <div class="ui-kpi-meta">SLA Target: &lt; 45 Mins</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">Digital Sign-Off Rate</div>
                            <div class="ui-kpi-num">100% Verified</div>
                            <div class="ui-kpi-meta">Customer Signature + Photo</div>
                        </div>
                        <div class="ui-kpi-card">
                            <div class="ui-kpi-label">SLA Escalation Alerts</div>
                            <div class="ui-kpi-num text-emerald">0 Breaches</div>
                            <div class="ui-kpi-meta">All Units within SLA Target</div>
                        </div>
                    </div>

                    <div class="ui-table-wrap">
                        <div class="ui-table-header">
                            <span>Order # & Client</span>
                            <span>Assigned Technician</span>
                            <span>GPS Milestone</span>
                            <span>Customer Sign-Off</span>
                            <span>Status</span>
                        </div>
                        <div class="ui-table-row">
                            <div class="ui-cell-name">
                                <strong>WO-9201 · Safaricom Fiber Hub</strong>
                                <small>Westlands Commercial Site</small>
                            </div>
                            <div class="ui-cell-dept">Eng. Dennis Kimani (Van #4)</div>
                            <div class="ui-cell-val text-emerald">On Site · Lat -1.267, Lon 36.804</div>
                            <div class="ui-cell-val">Pending Work Completion</div>
                            <div class="ui-cell-status"><span class="ui-tag-warning">In Progress</span></div>
                        </div>
                        <div class="ui-table-row">
                            <div class="ui-cell-name">
                                <strong>WO-9198 · Stanbic Tower Branch</strong>
                                <small>Kenyatta Avenue Site</small>
                            </div>
                            <div class="ui-cell-dept">Eng. Mary Auma (Van #2)</div>
                            <div class="ui-cell-val text-emerald">Completed at 11:15 AM</div>
                            <div class="ui-cell-val text-emerald">✓ Signed by Branch Manager</div>
                            <div class="ui-cell-status"><span class="ui-tag-done">Closed & Audited</span></div>
                        </div>
                    </div>

                    <div class="ui-telemetry-strip">
                        <span><span>•</span> GPS Route Tracing</span>
                        <span><span>•</span> Offline Work Order Sync</span>
                        <span><span>•</span> Digital Customer Signatures</span>
                        <span><span>•</span> Automated Billing Reconciliation</span>
                    </div>
                </div>
            </div>
            <?php
            break;

        case 'quantpay':
            ?>
            <div class="ui-mockup-frame">
                <div class="ui-mockup-bar">
                    <div class="ui-dots">
                        <span class="ui-dot red"></span>
                        <span class="ui-dot yellow"></span>
                        <span class="ui-dot green"></span>
                    </div>
                    <div class="ui-url-chip">
                        <span class="ui-lock-icon"><?= q_icon('lock-closed', '', 12) ?></span>
                        <span>api.quantpay.co.ke/v2/daraja/telemetry</span>
                    </div>
                    <div class="ui-env-badge">PAYMENT SWITCH · PROTOCOL MODEL</div>
                </div>
                <div class="ui-mockup-body">
                    <div class="ui-top-bar">
                        <div>
                            <div class="ui-title-sub">Gateway Architecture Model · Daraja 2.0 & KRA eTIMS VSCU</div>
                            <div class="ui-title-main">Payment Switch & Automated Fiscalization Telemetry</div>
                        </div>
                        <div class="ui-actions">
                            <span class="ui-pill-success">
                                <span class="pulse-dot green"></span>
                                99.99% Webhook Delivery
                            </span>
                        </div>
                    </div>

                    <div class="ui-code-preview">
                        <div class="code-line"><span class="c-key">POST</span> <span class="c-url">/v2/daraja/stk-push/callback</span> <span class="c-status">200 OK (610ms)</span></div>
                        <div class="code-line">{</div>
                        <div class="code-line indent"><span class="c-field">"MerchantRequestID"</span>: <span class="c-val">"29103-994102-1"</span>,</div>
                        <div class="code-line indent"><span class="c-field">"CheckoutRequestID"</span>: <span class="c-val">"ws_CO_07102026143000_8921"</span>,</div>
                        <div class="code-line indent"><span class="c-field">"ResultCode"</span>: <span class="c-val num">0</span>, <span class="c-comment">// Successful payment</span></div>
                        <div class="code-line indent"><span class="c-field">"MpesaReceiptNumber"</span>: <span class="c-val highlight">"TK928XZ189"</span>,</div>
                        <div class="code-line indent"><span class="c-field">"Amount"</span>: <span class="c-val num">48500.00</span>,</div>
                        <div class="code-line indent"><span class="c-field">"KRA_eTIMS_Signed"</span>: <span class="c-val true">true</span>,</div>
                        <div class="code-line indent"><span class="c-field">"KRA_QR_Code"</span>: <span class="c-val">"https://itax.kra.go.ke/etims/verify?code=07A9...FF12"</span></div>
                        <div class="code-line">}<span class="term-cursor"></span></div>
                    </div>

                    <div class="ui-telemetry-strip">
                        <span><span>•</span> Idempotent Deduplication Engine</span>
                        <span><span>•</span> KRA eTIMS Cryptographic QR Signing</span>
                        <span><span>•</span> Auto-Retry Webhook Queue (Redis)</span>
                        <span><span>•</span> Average Latency: 610ms</span>
                    </div>
                </div>
            </div>
            <?php
            break;
    }
}

