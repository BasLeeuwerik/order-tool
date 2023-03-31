<?php

namespace Domain\User\Enums;

enum PermissionType: string
{
    case ADMIN_DASHBOARD = 'admin_dashboard';

    case ADMIN_COMPANY_LIST = 'admin_company_list';
    case ADMIN_COMPANY_READ = 'admin_company_read';

    case ADMIN_PURCHASE_ORDER_LIST = 'admin_purchase_order_list';
    case ADMIN_PURCHASE_ORDER_READ = 'admin_purchase_order_read';

    case ADMIN_QUOTATION_LIST = 'admin_quotation_list';
    case ADMIN_QUOTATION_READ = 'admin_quotation_read';

    case ADMIN_INVOICE_LIST = 'admin_invoice_list';
    case ADMIN_INVOICE_READ = 'admin_invoice_read';

    case ADMIN_USER_LIST = 'admin_user_list';
    case ADMIN_USER_READ = 'admin_user_read';

    case ADMIN_DISCOUNT_CODE_LIST = 'admin_discount_code_list';
    case ADMIN_DISCOUNT_CODE_READ = 'admin_discount_code_read';

    case ADMIN_PRODUCT_LIST = 'admin_product_list';
    case ADMIN_PRODUCT_READ = 'admin_product_read';
    case ADMIN_PRODUCT_UPDATE = 'admin_product_update';

    case CLIENT_COMPANY_READ = 'client_company_read';
    case CLIENT_COMPANY_UPDATE = 'client_company_update';

    case CLIENT_PURCHASE_ORDER_LIST = 'client_purchase_order_list';
    case CLIENT_PURCHASE_ORDER_READ = 'client_purchase_order_read';

    case CLIENT_QUOTATION_LIST = 'client_quotation_list';
    case CLIENT_QUOTATION_READ = 'client_quotation_read';

    case CLIENT_USER_LIST = 'client_user_list';
    case CLIENT_USER_READ = 'client_user_read';

    case CLIENT_INVOICE_LIST = 'client_invoice_list';

    case CLIENT_QUOTATION_CREATE = 'client_quotation_create';
}
