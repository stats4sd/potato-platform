UPDATE flowering
SET 
plant_growth=(select id from choices where list_name='Habito_crecimiento' AND value=flowering.plant_growth),
leaf_dissection=(select id from choices where list_name='Diseccion_hoja' AND value=flowering.leaf_dissection),
number_lateral_leaflets=(select id from choices where list_name='Foliolos_laterales' AND value=flowering.number_lateral_leaflets),
number_intermediate_leaflets=(select id from choices where list_name='Inter_hojuelas' AND value=flowering.number_intermediate_leaflets),
number_leaflets_on_petioles=(select id from choices where list_name='Inter_hojuelas_peciolulos' AND value=flowering.number_leaflets_on_petioles),
color_stem=(select id from choices where list_name='Color_tallo' AND value=flowering.color_stem),
shape_stem_wings=(select id from choices where list_name='Forma_alas_tallo' AND value=flowering.shape_stem_wings),
degree_flowering_plant=(select id from choices where list_name='Grado_floracion' AND value=flowering.degree_flowering_plant),
shape_corolla=(select id from choices where list_name='corola' AND value=flowering.shape_corolla),
color_predominant_flower=(select id from choices where list_name='color_flor' AND value=flowering.color_predominant_flower),
intensity_color_predominant_flower=(select id from choices where list_name='color_intensidad_prediminante' AND value=flowering.intensity_color_predominant_flower),
color_secondary_flower=(select id from choices where list_name='color_secundario_flo' AND value=flowering.color_secondary_flower),
distribution_color_secodary_flower=(select id from choices where list_name='distribucion_color_secundario_flor' AND value=flowering.distribution_color_secodary_flower),
pigmentation_anthers=(select id from choices where list_name='Pigmentacion_anteras' AND value=flowering.pigmentation_anthers),
pigmentation_pistil=(select id from choices where list_name='Pigmentacion_pistilo' AND value=flowering.pigmentation_pistil),
color_chalice=(select id from choices where list_name='Color_caliz' AND value=flowering.color_chalice),
color_pedicel=(select id from choices where list_name='color_pedicelo' AND value=flowering.color_pedicel),

level_tolerance_late_blight=(select id from choices where list_name='tolerencia' AND value=flowering.level_tolerance_late_blight),
level_tolerance_hailstorms=(select id from choices where list_name='tolerencia' AND value=flowering.level_tolerance_hailstorms),
level_tolerance_frost=(select id from choices where list_name='tolerencia' AND value=flowering.level_tolerance_frost),
level_tolerance_drought=(select id from choices where list_name='tolerencia' AND value=flowering.level_tolerance_drought),
campana=(select id from choices where list_name='campana' AND value=flowering.campana);

UPDATE fructification
SET 
color_berries=(select id from choices where list_name='color_baya' AND value=fructification.color_berries),
shape_berry=(select id from choices where list_name='forma_baya' AND value=fructification.shape_berry),
maturity_variety=(select id from choices where list_name='madurez_variedad' AND value=fructification.maturity_variety),
berries=(select id from choices where list_name='bayas' AND value=fructification.berries),
campana=(select id from choices where list_name='campana' AND value=fructification.campana);

UPDATE tubers_at_harvest
SET 
color_predominant_tuber=(select id from choices where list_name='piel_color' AND value=tubers_at_harvest.color_predominant_tuber),
intensity_color_predominant_tuber=(select id from choices where list_name='piel_intensidad' AND value=tubers_at_harvest.intensity_color_predominant_tuber),
color_secondary_tuber=(select id from choices where list_name='piel_color_2' AND value=tubers_at_harvest.color_secondary_tuber),
distribution_color_secodary_tuber=(select id from choices where list_name='piel_color_2_dist' AND value=tubers_at_harvest.distribution_color_secodary_tuber),
shape_tuber=(select id from choices where list_name='forma' AND value=tubers_at_harvest.shape_tuber),
variant_shape_tuber=(select id from choices where list_name='forma_variante' AND value=tubers_at_harvest.variant_shape_tuber),
depth_tuber_eyes=(select id from choices where list_name='profunidad_ojos' AND value=tubers_at_harvest.depth_tuber_eyes),
color_predominant_tuber_pulp=(select id from choices where list_name='pulpa_color' AND value=tubers_at_harvest.color_predominant_tuber_pulp),
color_secondary_tuber_pulp=(select id from choices where list_name='pulpa_color_2' AND value=tubers_at_harvest.color_secondary_tuber_pulp),
distribution_color_secodary_tuber_pulp=(select id from choices where list_name='pulpa_color_2_dist' AND value=tubers_at_harvest.distribution_color_secodary_tuber_pulp),

level_tolerance_late_blight=(select id from choices where list_name='tolerencia' AND value=tubers_at_harvest.level_tolerance_late_blight),
level_tolerance_weevil=(select id from choices where list_name='tolerencia' AND value=tubers_at_harvest.level_tolerance_weevil),
level_tolerance_hailstorms=(select id from choices where list_name='tolerencia' AND value=tubers_at_harvest.level_tolerance_hailstorms),
level_tolerance_frost=(select id from choices where list_name='tolerencia' AND value=tubers_at_harvest.level_tolerance_frost),
level_tolerance_drought=(select id from choices where list_name='tolerencia' AND value=tubers_at_harvest.level_tolerance_drought),
campana=(select id from choices where list_name='campana' AND value=tubers_at_harvest.campana);

UPDATE sprouts
SET 
color_predominant_tuber_shoot=(select id from choices where list_name='brote_color' AND value=sprouts.color_predominant_tuber_shoot),
color_secondary_tuber_shoot=(select id from choices where list_name='brote_color_2' AND value=sprouts.color_secondary_tuber_shoot),
distribution_color_secodary_tuber_shoot=(select id from choices where list_name='brote_color_2_dist' AND value=sprouts.distribution_color_secodary_tuber_shoot),

campana=(select id from choices where list_name='campana' AND value=tubers_at_harvest.campana);