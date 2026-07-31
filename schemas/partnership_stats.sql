-- PostgreSQL

CREATE TABLE partnership_stats (
    id                      bigint NOT NULL DEFAULT nextval('partnership_stats_id_seq'::regclass),
    uuid                    uuid DEFAULT gen_random_uuid(),
    partnership_account_id  bigint NOT NULL,
    date                    timestamp with time zone,
    sales_count             integer NOT NULL DEFAULT 0,
    visitor_count           integer NOT NULL DEFAULT 0,
    customer_count          integer NOT NULL DEFAULT 0,
    subscription_count      integer NOT NULL DEFAULT 0,
    product_count           integer NOT NULL DEFAULT 0,
    created_at              timestamp with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at              timestamp with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at              timestamp with time zone,
    CONSTRAINT partnership_stats_pkey PRIMARY KEY (id)
);
