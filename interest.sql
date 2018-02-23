CREATE VIEW interest AS
SELECT attribute_id, title, short_name, parent_attribute_id, hiearchy, created_at, updated_at
FROM helix.research_interests
UNION ALL
SELECT attribute_id, title, short_name, parent_attribute_id, hiearchy, created_at, updated_at
FROM helix.personal_interests
UNION ALL
SELECT attribute_id, title, short_name, parent_attribute_id, hiearchy, created_at, updated_at 
FROM helix.teaching_interests
ORDER BY created_at ASC
