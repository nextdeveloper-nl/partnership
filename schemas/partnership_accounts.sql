-- PostgreSQL

CREATE TABLE partnership_accounts (
    id                         bigint NOT NULL DEFAULT nextval('partnership_accounts_id_seq'::regclass),
    uuid                       uuid DEFAULT gen_random_uuid(),
    iam_account_id             bigint NOT NULL,
    partner_code               text, -- [ro]
    is_brand_ambassador        boolean NOT NULL DEFAULT false, -- [ro]
    payable_income             numeric(20,8) NOT NULL DEFAULT 0, -- [ro]
    customer_count             integer NOT NULL DEFAULT 0, -- [ro]
    iban                       text, -- [ro]
    level                      integer NOT NULL DEFAULT 1, -- [ro]
    reward_points              integer NOT NULL DEFAULT 0, -- [ro]
    boosts                     json, -- [ro]
    mystery_box                json, -- [ro]
    badges                     json, -- [ro]
    is_suspended               boolean DEFAULT false, -- [ro]
    suspension_reason          text, -- [ro]
    is_approved                boolean DEFAULT false, -- [ro]
    created_at                 timestamp with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at                 timestamp with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at                 timestamp with time zone,
    technical_capabilities     text[], -- [label:"List of technical capabilities like; software development, integration, email marketing ..."]
    industry                   text, -- [label:"Which industry are you working on ?"]
    sector_focus               text[], -- [label:"Which sectors do you want to work in? It can be like; real estate, real estate sales, real estate development"]
    special_interest           text[], -- [label:"Special interest in certain verticals. This can be multiple things like; banking, fintech, insurance"]
    compliance_certifications  text[], -- [label:"Certifications like ISO9001, ISO27001...."]
    target_group               text[],
    is_reseller                boolean DEFAULT false,
    is_integrator              boolean DEFAULT false,
    is_distributor             boolean DEFAULT false, -- [ro]
    is_vendor                  boolean DEFAULT false,
    is_affiliate               boolean DEFAULT false, -- [ro]
    meeting_link               text,
    distributor_id             bigint, -- [alias:partnership_account_id]
    CONSTRAINT partnership_accounts_pkey PRIMARY KEY (id)
);
