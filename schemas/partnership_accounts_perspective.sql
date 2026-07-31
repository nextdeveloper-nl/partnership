-- PostgreSQL
-- VIEW (read-only; re-run this file with CREATE OR REPLACE VIEW whenever the SELECT needs to change)

CREATE OR REPLACE VIEW partnership_accounts_perspective AS
SELECT pa.id,
    pa.uuid,
    ia.name,
    ia.description,
    pa.iam_account_id,
    ia.iam_account_type_id,
    ( SELECT n_iat.name
           FROM iam_account_types n_iat
          WHERE n_iat.id = ia.iam_account_type_id) AS account_type,
    ia.common_domain_id,
    ( SELECT cd.name
           FROM common_domains cd
          WHERE ia.common_domain_id = cd.id) AS domain_name,
    ia.common_country_id,
    ( SELECT cc.name
           FROM common_countries cc
          WHERE ia.common_country_id = cc.id) AS country_name,
    ia.iam_user_id,
    ( SELECT n_iu.fullname
           FROM iam_users n_iu
          WHERE n_iu.id = ia.iam_user_id) AS account_owner,
    pa.distributor_id,
    ( SELECT pdp.name
           FROM partnership_distributors_perspective pdp
          WHERE pdp.id = pa.distributor_id) AS distributor,
    pa.partner_code,
    pa.is_brand_ambassador,
    pa.payable_income,
    pa.customer_count,
    pa.iban,
    pa.level,
    pa.reward_points,
    pa.boosts,
    pa.mystery_box,
    pa.badges,
    pa.technical_capabilities,
    pa.industry,
    pa.sector_focus,
    pa.special_interest,
    pa.compliance_certifications,
    pa.is_reseller,
    pa.is_integrator,
    pa.is_distributor,
    pa.is_vendor,
    pa.is_affiliate,
    pa.target_group,
    pa.meeting_link,
    pa.created_at,
    pa.updated_at,
    pa.deleted_at
   FROM partnership_accounts pa
     JOIN iam_accounts ia ON pa.iam_account_id = ia.id
  WHERE pa.is_suspended = false AND ia.deleted_at IS NULL;
