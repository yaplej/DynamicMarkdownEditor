<?php

namespace App\Filament\Resources\ChangeRequestResource\Pages;

use App\Filament\Resources\ChangeRequestResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\Action;
use App\Models\Approval;
use App\Models\ChangeRequest;
use App\Models\ChangeRequestApproval;
use App\Models\ChangeRequestRisk;
use App\Models\ServiceApprover;
use Closure;
use Illuminate\Support\Facades\Log;

class EditChangeRequest extends EditRecord
{
    protected static string $resource = ChangeRequestResource::class;
    
}
