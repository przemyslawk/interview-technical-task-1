<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Persistence;

use App\Infrastructure\UserDetail\Persistence\UserDetail;
use App\User\Domain\Model\UserBlueprintInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $email
 * @property bool $active
 * @property null|UserDetail $details
 */
class User extends Model implements UserBlueprintInterface
{
    protected $table = 'users';

    protected $fillable = [
        'email',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function details(): BelongsTo
    {
        return $this->belongsTo(UserDetail::class, 'id', 'user_id');
    }

    public function getDetails(): ?UserDetail
    {
        return $this->details;
    }
}
