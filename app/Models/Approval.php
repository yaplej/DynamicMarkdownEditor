<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
        
    /**
     * @var string $table
     */
    protected $table = 'approvals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'approved'
    ];

    public function changerequestapproval()
    {
        return $this->belongsToMany(
            ChangeRequest::class,
            'change_request_approvals',
            'approval_id',
            'change_request_id',
        );
    }
}
