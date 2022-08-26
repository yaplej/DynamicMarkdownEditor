<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeRequest extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'change_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function changerequeststate()
    {
        return $this->belongsTo(ChangeRequestState::class);
    }

    public function changerequesttype()
    {
        return $this->belongsTo(ChangeRequestType::class);
    }

    public function changerequestnode()
    {
        return $this->hasMany(
            ChangeRequestNode::class,
        );
    }

    # https://laravel.com/docs/9.x/eloquent-relationships#many-to-many
    public function changerequestapproval()
    {
        return $this->belongsToMany(
            Approval::class,
            'change_request_approvals',
            'change_request_id',
            'approval_id',
        );
    }

    //public function changerequestapproval()
    //{
    //    return $this->hasMany(
    //        ChangeRequestApproval::class,
    //    );
    //}

    //public function changerequestapproval(){
    //    return $this->hasManyThrough(
    //        Approval::class,
    //        ChangeRequestApproval::class,
    //        'approval_id',
    //        'id',
    //        //'id',
    //        //'id',
    //    );
    //}

    public function nextstate()
    {
        $this->changerequeststate_id = $this->changerequeststate_id + 1;
        $this->save();
    }

    public function prevstate()
    {
        $this->changerequeststate_id = $this->changerequeststate_id - 1;
        $this->save();
    }
    
}
