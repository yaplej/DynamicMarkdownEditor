<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeRequestApproval extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'change_request_approvals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'change_request_id',
        'approval_id',
    ];

    public function change_request()
    {
        return $this->belongsTo(ChangeRequest::class);
    }

    public function approval()
    {
        return $this->belongsTo(Approval::class);
    }

}
