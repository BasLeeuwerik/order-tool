<?php

namespace Domain\User\Enums;

enum RoleType: string
{
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'admin';
    case CLIENT = 'client';
}
