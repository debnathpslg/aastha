<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExpenseApprovalTest extends TestCase
{
    // public function test_field_visit_expense_cannot_be_approved_if_visit_pending()
    // {
    //     $claim = ExpenseClaim::factory()->create([
    //         'expense_head' => 'Field Visit',
    //         'claim_status' => 'Pending',
    //     ]);

    //     $visit = Visit::factory()->create([
    //         'visit_status' => 'Pending',
    //         'visit_date' => $claim->transaction_date,
    //     ]);

    //     $claim->update(['visit_id' => $visit->id]);

    //     $approver = User::factory()->create();

    //     $this->expectException(\DomainException::class);

    //     app(ExpenseApprovalService::class)
    //         ->approve($claim, $approver);
    // }

    // public function test_field_visit_expense_is_approved_if_visit_done()
    // {
    //     $claim = ExpenseClaim::factory()->create([
    //         'expense_head' => 'Field Visit',
    //         'claim_status' => 'Pending',
    //     ]);

    //     $visit = Visit::factory()->create([
    //         'visit_status' => 'Done',
    //         'visit_date' => $claim->transaction_date,
    //     ]);

    //     $claim->update(['visit_id' => $visit->id]);

    //     $approver = User::factory()->create();

    //     app(ExpenseApprovalService::class)
    //         ->approve($claim, $approver);

    //     $this->assertEquals('Approved', $claim->fresh()->claim_status);
    // }
}
